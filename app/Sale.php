<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $table = 'sales';
  protected $guarded = array('id');
  public $timestamps = true;

  public static $rules = array(
    'payment' => 'required',
    'send_postal' => 'required',
    'send_prefectures' => 'required',
    'send_address1' => 'required'
  );

  public function item(){
    return $this->belongsTo('App\Item');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
