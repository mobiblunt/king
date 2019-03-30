<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashiController extends Controller
{
     public function about() {

        return view('about');
 

    }

 public function affiliate() {

        return view('affiliate');


    }
    
    
    public function how() {

        return view('how');


    }




    public function construction() {

        return view('construction');


    }


    public function online() {

        return view('online');


    }


    public function escrow() {

        return view('escrow');


    }


    public function faq() {

        return view('news');


    }
    
    public function api() {

        return view('api');


    }


    public function money() {

        return view('money');


    }



    public function agent() {

        return view('agent');


    }


    public function property() {

        return view('property');


    }

public function vehicle() {

        return view('vehicle');


    }





    public function industrial() {

        return view('construction');


    }

 public function contact() {

        return view('contact');


    }

 public function privacy() {

        return view('privacy');


    }

 public function robots() {

        return view('robots');


    }

 public function steps() {

        return view('steps');


    }

 public function terms() {

        return view('terms');


    }
}
