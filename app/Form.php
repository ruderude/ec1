<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'name' => 'required',
    'email' => 'required|email',
    'text' => 'required|between:0,2000'
  );
}
