<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use CoinPayment;
use Uuid;
use App\Deposit; 
use App\Plan;
use App\Alert;
use App\Account; 
use Carbon\Carbon;
use App\Transaction;
use App\Invite;


class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function invitation($email)

    {

        $inv = Invite::where('email', $email)->firstOrFail();




        return view('home.invitation',compact('email','inv'));
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
            'amount' => 'required',
            
            ]);

        $tranid = Uuid::generate()->string;

        //dd(request('profit'));

        $dep = Deposit::create([
            'user_id' => Sentinel::getUser()->id,
            'amount' => request('amount'),
            'pay_option' => 'USD',
            'plan_id' => request('plan_id'),
            'trans_id' => $tranid,
            'mobile' => request('mobile'),
            'owing' => 0,
            ]);

            
            //$dep->save();

            $dep_id = $dep->id;

            return redirect('/deposit-btc-qr/'.$dep_id);


            
            //return view('home.details', compact('dep'));
    }



     public function details($id)
    {
        //Second step in payment route

        //return $payment; 
        $depo = Deposit::where('id', $id)->firstOrFail();

        $plan = Plan::where('id', $depo->plan_id)->firstOrFail();

        $total = $plan->minimum + $plan->robot_charge;
        
        //dd($depo);

        return view('home.details', compact('depo','plan', 'total'));
    }


        public function alert(Request $request)
    {
         $result = $this->validate($request, [
            'amount' => 'required',
            'date' => 'required',
            
            ]);

        

        $alert = Alert::create([
            'deposit_id' => request('dep_id'),
            'amount' => request('amount'),
            'date_paid' => request('date'),
            ]);

            
            

            $dep_id = request('dep_id');

            session()->flash('success', "Alert Has been Sent.");

            return redirect('/deposit-btc-qr/'.$dep_id);


            
            //return view('home.details', compact('dep'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
    public function update(Request $request)
    {


       $acc_id = $request->input('acc'); 
       
       $account = Account::find($acc_id);


        $currentdate = Carbon::now();

        if ($request->get('plan_id') == "1") {


           $duration = $currentdate->addDays(21)->toDateString();
           
        }
        elseif ($request->get('plan_id') == "4" || $request->get('plan_id') == "5") {
            $duration = $currentdate->addDays(30)->toDateString();
        }
        else {
            $duration = $currentdate->addDays(100)->toDateString();
        }


    

       $account->plan_id = $request->input('plan'); 

       $account->end_date = $duration; 

        $account->save();


         return redirect('userwallet')->with('status', 'Plan Has Been Succesfully Subscribed');
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
