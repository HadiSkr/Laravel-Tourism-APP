<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $table = 'hotels';
    protected $primaryKey = 'Hotel_Id';

    protected $fillable = [
      'Hotel_Id',
      'name',
      'email',
      'images',
      'popular_amenities',
	  'property_amenities',
      'Room_amenities',
      'Payments_type',
      'check_in_out_times',
      'policies_and_instructions',
      'children_and_extra_beds',
      'optional_extras_and_fees',
      
	];


  
}

