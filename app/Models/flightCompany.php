<?php

namespace App\Models;





use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
//use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


//use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class flightCompany extends model
{
  use HasApiTokens, HasFactory, Notifiable;//PersonalAccessToken;
    protected $table = 'flight_companies';
    protected $primaryKey = 'flightCompany_id';

    protected $fillable = [
      'flightCompany_id',
      'Images',
      'Name',
      'email',
	  'available_cities',
      'books_types',
      'Available_features',
      'flight_costs_and_offers',
      'Policies_requirements'
	];
}
