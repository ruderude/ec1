<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = array('id');
    public $timestamps = true;

    public static $rules = array(
        'name_kanji' => 'required',
        'name_kana' => 'required|integer',
        'user_id' => 'required|integer',
        'payment_id' => 'required|integer',
        'sale_price' => 'required|integer',
        'fee' => 'required|integer',
        'send_postal' => 'required',
        'send_prefectures' => 'required',
        'send_address1' => 'required'
      );
}
