<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = array('id');

    protected $fillable = [
        'name'
    ];
}
