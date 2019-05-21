<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'fees';
    protected $guarded = array('id');
    public $timestamps = true;

    protected $fillable = [
        'underprice','overprice','fee',
    ];

    public static $rules = array(
        'underprice' => 'required|integer',
        'overprice' => 'required|integer',
        'fee' => 'required|integer'
    );
}
