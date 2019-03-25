<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Uuid;
use App\Withdrawal; 


class WithdrawalController extends Controller
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

        $wit = Withdrawal::create([
            'user_id' => Sentinel::getUser()->id,
            'amount' => request('amount'),
            'pay_option' => request('option'),
            'address' => request('address'),
            'tran_id' => $tranid,
            'mobile' => request('mobile'),
            ]);

            
            //$dep->save();

            $wit_id = $wit->id;

            return redirect('/withdraw-btc-qr/'.$wit_id);


    }



     public function details($id)
    {
        //Second step in payment route

        //return $payment; 
        $wit = Withdrawal::where('id', $id)->firstOrFail();

        
        
        //dd($depo);

        return view('home.wit', compact('wit'))->with('success', 'Withdrawal Submitted Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
