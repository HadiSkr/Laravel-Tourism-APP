<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restuarant extends Model
{
    protected $table = 'restuarants';
    protected $primaryKey = 'Restaurant_id';

    protected $fillable = [
      'Restaurant_id',
      'name',
      'image',
      'email',
      'dietary_option',
      'Cuisine',
	     'Serving',
      'features',
      'delivery_options',
      'location_id',
      'company_id'
	];
}
