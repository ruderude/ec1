<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $table = 'sales';
  protected $guarded = array('id');
  public $timestamps = true;

  // public static $rules = array(
  //   'count' => 'required'
  // );
}
