<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Plan;
use App\Deposit;
use App\Withdrawal;
use App\Account;
use App\User;
use App\Transaction;
use App\Alert;
use Carbon\Carbon;
//use Sentinel;

class DashController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('sentinel.auth');
        
    }




    public function index()

    {
        if(Sentinel::inRole('administrator'))
       {

        $alert = Alert::all();
       
        return view('centaur.dashboard' , compact('alert'));
       } 
       else {



        $user = Sentinel::getUser()->plan_id;

        $buys = Transaction::where('buyer_id', Sentinel::getUser()->id)->get();

        $sales = Transaction::where('seller_id', Sentinel::getUser()->id)->get();

        

        $dat = Carbon::now()->toDateString();

        //dd($alert);

        $acct = Account::where('user_id', Sentinel::getUser()->id)->first();

        //$plan1 = Plan::where('id', $acct->plan_id)->first();

        //dd($sales);

        //dd($acct);

        return view('centaur.dashboard' , compact('buys','sales'));

        }
    }


    public function getTrans() {

        $dep = Deposit::where('user_id', Sentinel::getUser()->id)->get();

        $wit = Withdrawal::where('user_id', Sentinel::getUser()->id)->get();;


    	return view('home.transactions' , compact('dep','wit'));


    }


    public function getTra() {

        $user = Sentinel::getUser()->dob;

        


        if($user) {

           return view('home.tran'); 


       }

        else {


            return view('home.update');
        }
        


    }

    public function getDep() {

        //$plans = Plan::all();

         $acct = Account::where('user_id', Sentinel::getUser()->id)->first();

        $plan1 = Plan::where('id', $acct->plan_id)->first();


        //dd($user);

    	return view('home.deposit', compact('plan1'));


    }


    public function getWith() {

    	return view('home.withdrawal');


    }


    public function getWallet() {


        $plans = Plan::all();


        $user = Sentinel::getUser()->plan_id;

        $acct = Account::where('user_id', Sentinel::getUser()->id)->first();

        $plan1 = Plan::where('id', $acct->plan_id)->first();

        $dat = Carbon::now()->toDateString();


        //dd($plan1);

        

        return view('home.wallet' , compact('plan1','acct','dat','plans'));


    }


     public function getRef() {

        $users = User::where('ref', Sentinel::getUser()->u_id)->get();

        //dd($users);

        return view('home.ref', compact('users'));


    }








}
