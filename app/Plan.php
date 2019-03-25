<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'profit', 'duration', 'minimum', 'maximum', 'charge'
    ];
}
