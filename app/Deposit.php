<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'plan_id', 'pay_option', 'status','trans_id','btc_amt','mobile',
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
