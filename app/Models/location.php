<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'location_id';
    protected $fillable = [
      'location_id',
      'city',
      'street',
	  'long',
    //'email',
      'width'
     
      
	];
}
