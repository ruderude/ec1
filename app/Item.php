<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
      'name' => 'required',
      'list_price' => 'required|integer',
      'sale_price' => 'required|integer',
      'file' => 'max:40240|mimes:jpeg,gif,png'
    );
}
