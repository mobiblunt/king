<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tracking;

class TrackingController extends Controller
{
    public function index()
    {
		$all = Tracking::all();

    	return view('welcome', compact('all'));
    }

    public function add()
    {
    	return view('add');
    }



    public function add_pack(Request $request)
    {
    	 $this->validate($request, [
            'product' => 'required',
            'tracking' => 'required',
            'delivery_date' => 'required',
        ]);


        $track = Tracking::create([
            'product' => $request['product'],
            'tracking_code' => $request['tracking'],
            'delivery_date' => $request['delivery_date'],
            'origin' => $request['origin'],
            'zip' => $request['zip'],
            'from' => $request['from'],
            'country' => $request['country'],
            'waybill_no' => $request['waybill_no'],
            'orignate_count' => $request['size'],
            'to' => $request['to'],
            'address' => $request['address'],
            'shipment_date' => $request['shipment_date'],
        ]);

        if ($track) {
        	echo '<script language="javascript">';
			echo 'alert("tracking successfully added")';
			echo '</script>';

			return redirect('home');
        }
        else {
        	echo "error";
        }


    	
        
    }

    public function search(Request $request, $trackingCode)
    {
        return Tracking::where('tracking_code', $trackingCode)->get();
    }

    public function searchme(Request $request)
    {
        $trackers = Tracking::where('tracking_code', $request->trackingCode)->first();

        //dd($trackers);

        
        return view('tracks')->with('tracks' , $trackers);
        
        
    }
}
