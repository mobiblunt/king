<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'email', 'transaction_id'
    ];


     public function transaction()
  {
    return $this->belongsTo('App\Transaction');
  }
}
