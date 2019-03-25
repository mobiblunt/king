<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'deposit_id', 'amount', 'date_paid'
    ];



     public function deposit()
    {
    	return $this->belongsTo(Deposit::class);
    }
}
