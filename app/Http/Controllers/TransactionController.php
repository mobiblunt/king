<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Invite;
use App\Transaction;
use ImageIntervention;
use Illuminate\Support\Facades\Storage;
use Mail;

use App\Http\Requests;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       
        $this->middleware('sentinel.auth');
        
    }



    public function index()
    {
        //
    }




    public function updateUser(Request $request)
    {
       
        $this->validate($request, [
            'dob' => 'required',
            'id_pic' => 'required'
        ]);
        $user = User::where('id', Sentinel::getUser()->id)->firstOrFail();
        if ($request->hasFile('id_pic')) {
            
            $id_pic = $request->file('id_pic');
            $filename = $user->email . '.' . $id_pic->getClientOriginalExtension();
            $img = ImageIntervention::make($id_pic->getRealPath());
           /* $img->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });*/
            $img->stream();
            Storage::put('transaction/useridentitity/'. $filename, $img, 'public');
            $user->pic = $filename;
        }
        $user->dob = $request->dob;
        
        $user->save();

        return redirect()->route('get.tra');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->validate($request, [
            'type' => 'required',
            'tran_name' => 'required',
            'desig' => 'required',
            'desc' => 'required',
            'release' => 'required',
            'other_email' => 'required',
            'p_value' => 'required',
            'fee' => 'required',
            'who_fees' => 'required',
            ]);


        $pur = (float) request('p_value');

        $fe = (float) request('fee');

        if (request('who_fees') == "buyer" ) {

            $buy  = $pur + $fe;

            $sell = $pur; 
            
        }
        elseif (request('who_fees') == "seller" ) {
            
            $buy  = $pur;

            $sell = $pur - $fe;
        }

        elseif (request('who_fees') == "split") {

            $div = $fe / 2;

            $buy  = $pur + $div;

            $sell = $pur - $div;
        }

       

        

        $tran = Transaction::create([
            'name' => request('tran_name'),
            'type' => request('type'),
            'description' => request('desc'),
            'release_term' => request('release'),
            'purchase_value' => request('p_value'),
            'sellers_balance' => $sell,
            'buyers_payment' => $buy,
            'who_fees' => request('who_fees'),
            'email' => request('other_email'),
            'fee' => request('fee'),
            
            ]);


         if (request('desig') == "Seller") {
                

                $tran->seller_id = Sentinel::getUser()->id;
            }
            elseif (request('desig') == "Buyer") {

                $tran->buyer_id = Sentinel::getUser()->id;
                
            }

            
            $tran->save();


            $inv = Invite::create([
            'email' => $tran->email,
            'transaction_id' => $tran->id,
            
            ]);

            $email = $tran->email;

            $named = $tran->name;


            Mail::queue(
                'centaur.email.invite',
                [
                    'first_name' => Sentinel::getUser()->first_name,
                    'last_name' => Sentinel::getUser()->last_name,
                    'email' => $email,
                    'name' => $named,

            ],
                function ($message) use ($email) {
                    $message->to($email)
                        ->subject('Escrow Custodian Services - Invitation');
                }
            );


            return redirect('dashboard')->with('status', 'Transaction Succesfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trans = Transaction::where('id', $id)->firstOrFail();


         return view('home.trad', compact('trans'));
    }


    public function storeTran(Request $request)
    {
        $trans = Transaction::where('id', request('tran_id'))->firstOrFail();

        $trans->status = "PENDING FUNDING";

        if ($trans->buyer_id) {
            
            $trans->seller_id = Sentinel::getUser()->id;
        }

        else {

            $trans->buyer_id = Sentinel::getUser()->id;

        }

       

        $trans->save();


         return view('home.trad', compact('trans'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
