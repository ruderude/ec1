<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $table = 'carts';
  protected $guarded = array('id');
  public $timestamps = true;

  // public static $rules = array(
  //   '_token' => 'required'
  // );
}
