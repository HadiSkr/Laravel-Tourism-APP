<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posthotel extends Model
{
    protected $table = 'posthotels';
    protected $primaryKey = 'Post_Id';

    protected $fillable = [
      'Post_Id',
      'image',
      'price',
      'email',
      'room_size',
      'View ',
	  'number_of_beds ',
      'types_of_bed',
      'policies_and_instructions',
      'entertainment',
      'Food_and_Drink',
      'extra_options_fees',
      'More',
      
	];
}
