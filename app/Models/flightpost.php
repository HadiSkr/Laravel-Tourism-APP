<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flightpost extends Model
{
    protected $table = 'flightposts';
    protected $primaryKey = 'flight_post_id';

    protected $fillable = [
      'flight_post_id',
      'images',
      'flying_from',
	  'flying_to  ',
    'email',
      'dates',
      'num_travellers ',
      'Timr_to_arrive'
      
	];
}
