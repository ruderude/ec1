<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $guarded = array('id');
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_kanji','name_kana','sex','age', 'email',
        'password', 'postal', 'prefectures', 'address1', 'address2', 'state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = array(
      'password' => 'required',
      'name_kanji' => 'required|max:100',
      'name_kana' => 'required|max:100',
      'sex' => 'required',
      'email' => 'required|email',
      'postal' => 'required',
      'prefectures' => 'required',
      'address1' => 'required'
    );

}
