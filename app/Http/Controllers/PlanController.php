<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Users\IlluminateUserRepository;
use App\Plan; 

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.role:administrator');

        
    }



    public function index()
    {
        $plans = Plan::all();

        

        return view('admin.plans', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addplan');
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
            'name' => 'required',
            'profit' => 'required',
            'duration' => 'required',
            'minimum' => 'required',
            'maximum' => 'required'
            ]);

        $plan = Plan::create([
            'name' => request('name'),
            'profit' => request('profit'),
            'duration' => request('duration'),
            'minimum' => request('minimum'),
            'maximum' => request('maximum'),

            ]);
            
            $plan->save();
            
            return redirect('plans')->with('success', 'New Plan Created');
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
        $plan = Plan::where('id', $id)->firstOrFail();

        return view('admin.planupdate', compact('plan'));
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
        $plan_id = $request->input('plan_id');

        //Update Deposit
        
        

       
        
        //Get Payment instance 
        $plan = Plan::where('id', $plan_id)->firstOrFail();

        
        $plan->name = request('name');
        $plan->profit = request('profit');
        $plan->robot_charge = request('charge');
        $plan->duration = request('duration');
        $plan->minimum = request('min');
        $plan->maximum = request('max');


        

        $plan->save();


        
        return redirect('plans')->with('status', 'Plan details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$id = $this->decode($hash);
        $plan = Plan::where('id', $id)->first();

        

        // Remove the user
        $plan->delete();

        // All done
        $message = "Plan has been deleted.";
        

        session()->flash('success', $message);
        return redirect()->route('plans.index');
    }

    
}
