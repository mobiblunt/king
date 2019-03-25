<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     protected $fillable = [
        'name', 'description', 'release_term', 'sellers_balance', 'buyers_payment', 'fee', 'dob', 'status', 'buyer_id','seller_id', 'email', 'purchase_value', 'who_fees', 'type'
    ];




    public function userb()
  {
    return $this->belongsTo('App\User', 'buyer_id');
  }

 public function users()
  {
    return $this->belongsTo('App\User', 'seller_id');
  }

}

