<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carscompanypost extends Model
{
  protected $primaryKey = 'car_post_id';
  
  protected $fillable = [
        'car_post_id',
        'image',
        'name',
        'price',
        'email',
        'description ',
        'brand',
        'model_year',
        'color'
      ];
}

