<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Account extends Model
{
    protected $fillable = [
        'user_id', 'balance', 'earnings','dollars','plan_id', 'owing', 'end_date'
    ];



     public function user()
    {
    	return $this->belongsTo(User::class);
    }


     public function plan()
    {
    	return $this->belongsTo(Plan::class);
    }


    



}
