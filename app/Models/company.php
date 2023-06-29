<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class company extends Model
{
  use HasApiTokens;
    protected $table = 'companies';
    protected $primaryKey = 'company_id';

    protected $fillable = [
      'company_id',
      'type',
      'name',
      'email',
	  'password',
      'Commercial_record',
      'phone',
      'five_stars',
      'num_folows'
	];
}
