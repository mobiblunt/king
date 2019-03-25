<?php

namespace App\Http\Controllers\Auth;

use Mail;
use Session;
use Sentinel;
use Activation;
use App\Http\Requests;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Centaur\Mail\CentaurWelcomeEmail;
use App\User;
use App\Invite;
use App\Plan;
use App\Account;
use ImageIntervention;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

class RegistrationController extends Controller
{
    /** @var Centaur\AuthManager */
    protected $authManager;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */ 
    public function __construct(AuthManager $authManager)
    {
        $this->middleware('sentinel.guest');
        $this->authManager = $authManager;
    }

    /**
     * Show the registration form
     * @return View
     */
    public function getRegister()
    {
        $plans = Plan::all();
        return view('Centaur::auth.register', compact('plans'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Response|Redirect
     */
    protected function postRegister(Request $request)
    {
        // Validate the form data
        $result = $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'country' => 'required'
        ]);



        
        


        // Assemble registration credentials
        $credentials = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'mobile' => $request->get('mobile'),
            'country' => $request->get('country'),
        ];

        $activate = false;
        //dd();

        // Attempt the registration
        $result = $this->authManager->register($credentials, $activate);

        if ($result->isFailure()) {
            return $result->dispatch();


        }

         // Send the activation email
        $code = $result->activation->getCode();
        $email = $result->user->email;
        $name = $result->user->first_name;

        //Mail::to($email)->queue(new CentaurWelcomeEmail($email, $code, 'Your account has been created!'));
       

       
        

        Mail::queue(
                'centaur.email.welcome',
                [
                    'name' => $name,
                    'email' => $email,
                    'code' => $code

            ],
                function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Welcome To Escrow Custodian Services');
                }
            );

        // Ask the user to check their email for the activation link
        $result->setMessage('Registration complete.  Please check your email for activation instructions.');



        // There is no need to send the payload data to the end user
        $result->clearPayload();

        //session()->flash('success', 'Registration complete.  Please login to your dashboard.');
        // Return the appropriate response
        return $result->dispatch(route('auth.login.form'));
    }


     protected function postRegisterInv(Request $request)
    {
        // Validate the form data
        $result = $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'country' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'id_pic' => 'required',
            'btc' => 'required',
        ]);



        
        
        if ($request->hasFile('id_pic')) {
            
            $id_pic = $request->file('id_pic');
            $filename = $request->get('email') . '.' . $id_pic->getClientOriginalExtension();
            $img = ImageIntervention::make($id_pic->getRealPath());
            
            $img->stream();
            Storage::put('transaction/useridentitity/'. $filename, $img, 'public');
           
        }

        // Assemble registration credentials
        $credentials = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'mobile' => $request->get('mobile'),
            'country' => $request->get('country'),
            'address' => $request->get('address'),
            'dob' => $request->get('dob'),
            'btc' => $request->get('btc'),
            'pic' => $filename,
        ];

        $activate = true;
        //dd();

        // Attempt the registration
        $result = $this->authManager->register($credentials, $activate);

        if ($result->isFailure()) {
            return $result->dispatch();


        }

         // Send the activation email
        //$code = $result->activation->getCode();
        $email = $result->user->email;
        $name = $result->user->first_name;



        //Mail::to($email)->queue(new CentaurWelcomeEmail($email, $code, 'Your account has been created!'));
       
       $inv = Invite::where('email', $email)->firstOrFail();

       $inv->status = "DONE";

       $inv->save();


       
        

        Mail::queue(
                'centaur.email.welcomes',
                [
                    'name' => $name,
                    'email' => $email
            ],
                function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Welcome To Escrow Custodian Services');
                }
            );


        $credo = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
        ];

        // Ask the user to check their email for the activation link
        $remember = false;

        // Attempt the Login
        $results = $this->authManager->authenticate($credo, $remember);



        // There is no need to send the payload data to the end user

        //session()->flash('success', 'Registration complete.  Please login to your dashboard.');
        // Return the appropriate response

        return $results->dispatch(route('tras.get', $inv->transaction_id));

        //return redirect('/escrow-transaction-details/'.$inv->id);
        //return $result->dispatch(route('auth.login.form'));
    }


    /**
     * Activate a user if they have provided the correct code
     * @param  string $code
     * @return Response|Redirect
     */
    public function getActivate(Request $request, $code)
    {
        // Attempt the registration
        $result = $this->authManager->activate($code);

        if ($result->isFailure()) {
            // Normally an exception would trigger a redirect()->back() However,
            // because they get here via direct link, back() will take them
            // to "/";  I would prefer they be sent to the login page.
            $result->setRedirectUrl(route('auth.login.form'));
            return $result->dispatch();
        }

        // Ask the user to check their email for the activation link
        $result->setMessage('Registration complete.  You may now log in.');

        // There is no need to send the payload data to the end user
        $result->clearPayload();

        // Return the appropriate response
        return $result->dispatch(route('auth.login.form'));
    }

    /**
     * Show the Resend Activation form
     * @return View
     */
    public function getResend()
    {
        return view('Centaur::auth.resend');
    }

    /**
     * Handle a resend activation request
     * @return Response|Redirect
     */
    public function postResend(Request $request)
    {
        // Validate the form data
        $result = $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);

        // Fetch the user in question
        $user = Sentinel::findUserByCredentials(['email' => $request->get('email')]);

        // Only send them an email if they have a valid, inactive account
        if (!Activation::completed($user)) {
            // Generate a new code
            $activation = Activation::create($user);

            // Send the email
            $code = $activation->getCode();
            $email = $user->email;
            Mail::to($email)->queue(new CentaurWelcomeEmail($email, $code, 'Account Activation Instructions'));
        }

        $message = 'New instructions will be sent to that email address if it is associated with a inactive account.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message], 200);
        }

        Session::flash('success', $message);
        return redirect('/dashboard');
    }
}
