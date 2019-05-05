<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';
  protected $guarded = array('id');
  public $timestamps = true;

  public static $rules = array(
    'category_name' => 'required'
  );

  public function item(){
    return $this->hasMany('App\Item');
  }

}
