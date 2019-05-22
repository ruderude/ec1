<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table = 'order_items';
    protected $guarded = array('id');
    public $timestamps = true;

    public static $rules = array(
        'order_id' => 'required|integer',
        'name' => 'required',
        'counts' => 'required|integer',
        'sale_price' => 'required|integer',
      );
}
