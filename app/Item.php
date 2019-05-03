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
      'file' => 'mimes:jpeg,gif,png'
    );

    public function category(){
      return $this->belongsTo('App\Category');
    }
}
