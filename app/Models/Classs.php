<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $fillable = [
        'class_id',
        'Booking_type',
        'cost'
    
      ];
}

