<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\user_info as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class user_info extends model
{
  protected $primaryKey = 'userid';
  use HasApiTokens, HasFactory, Notifiable;
        protected $table = 'user_infos';
    protected $fillable = [
      'userid',
      'name',
      'password',
	    'image',
      'email',
      'gender',
      'phone',
      'birthdate'
	];

  protected $hidden = [
    'password',
    'remember_token',
];









}
