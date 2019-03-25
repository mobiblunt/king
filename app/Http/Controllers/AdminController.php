<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Users\IlluminateUserRepository;
use App\Deposit; 
use App\Plan;
use App\Account;
use App\Withdrawal;




class AdminController extends Controller
{


	public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.role:administrator');

        
    }




    public function payments() {

        $dep = Deposit::all();


        //$user = Sentinel::getUser()->plan_id;

        //$plan1 = Plan::where('id', $user)->first();

        //dd($plan1);

        

        return view('admin.payments', compact('dep'));

    }


    public function withdrawal() {

        $wit = Withdrawal::all();

    	return view('admin.withdrawals', compact('wit'));


    }


    public function update($id) {


        $depo = Deposit::where('id', $id)->firstOrFail();

        return view('admin.update', compact('depo'));


    }

    public function witUpdate($id) {


        $wit = Withdrawal::where('id', $id)->firstOrFail();

        return view('admin.witupdate', compact('wit'));


    }



    public function acctUpdate($id) {


        $acc = Account::where('id', $id)->firstOrFail();

        return view('admin.accupdate', compact('acc'));


    }



     public function store(Request $request)
    {
        //Validate 
        $this->validate($request, [
            'amount' => 'required',
            'earnings' => 'required',
            'owing' => 'required',
            'status' => 'required', 
            ]);

        //grab variables
        $deposit_id = $request->input('dep_id');

        //Update Deposit
        
        $deposit = Deposit::find($deposit_id);

       
        
        //Get Payment instance 
        $account = Account::where('user_id', $deposit->user_id)->firstOrFail();

        //dd($account);

        $amont = (float) $account->dollars;

        $amonti = (float) request('amount');

        $ear = (float) $account->earnings;

        $eari = (float) request('earnings');

       
                        
        $newAmount = $amont + $amonti;

        $newEarn = $ear + $eari;

        

        //$account->balance = $newAmount;
        $account->earnings = $newEarn;
        $account->dollars = $newAmount;
        
        //dd($account);

        $account->owing = request('owing');


        

        $account->save();

        

        $deposit->status = request('status');

        
        $deposit->save();

        return redirect('payments')->with('status', 'Payment details updated');
    }




     public function witStore(Request $request)
    {
        //Validate 
        $this->validate($request, [
            'status' => 'required',

            ]);

        //grab variables
        $wit_id = $request->input('wit_id');

        //Update Deposit
        
        $wit = Withdrawal::find($wit_id);

       
        
        


        $wit->status = request('status');

        
        $wit->save();

        return redirect('userwithdrwals')->with('status', 'Withdrawal details updated');
    }



    public function accStore(Request $request)
    {
        //Validate 
        

        //grab variables
        $acc_id = $request->input('acc_id');

        //Update Deposit
        
        

       
        
        //Get Payment instance 
        $account = Account::where('id', $acc_id)->firstOrFail();

        
        $account->dollars = request('amount');
        $account->earnings = request('earnings');
        $account->owing = request('owing');
        

        

        $account->save();


        
        return redirect('wallets')->with('status', 'Account details updated');
    }



    public function dellAcc($id)
    {
        // Fetch the user object
        //$id = $this->decode($hash);
        $acc = Account::where('id', $id)->first();

        

        // Remove the user
        $acc->delete();

        // All done
        $message = "Account has been removed.";
        

        session()->flash('success', $message);
        return redirect()->route('wallets.index');
    }




}
