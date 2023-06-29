<?php

namespace App\Http\Controllers;

use App\Models\flightCompany;
use Illuminate\Http\Request;
use App\Models\location;
use Illuminate\Http\Response;



use DB;
class FlightCompanyController extends Controller
{

    public function flightProfile(Request $req){
        $flig = new flightCompany;
        $location  = new location;
       /*
        $Images = $req->input('Images');
        $Name = $req->input('Name');
        $available_cities = $req->input('available_cities');
        $books_types = $req->input('books_types');
        $Available_features = $req->input('Available_features');
        $flight_costs_and_offers = $req->input('flight_costs_and_offers');
        $Policies_requirements = $req->input('Policies_requirements');
        $location_id= $req->input('location_id');
        $company_id= $req->input('company_id');
 */
$fields = $req->validate([
    'Images' => 'required',
    'email' => 'required|string',
    'Name' => 'required|string',
    'available_cities' => 'required|string',
    'books_types' => 'required|string',
    'Available_features' => 'required|string',
    'flight_costs_and_offers' => 'required|string',
    'Policies_requirements' => 'required|string',
   // 'city'=> 'required|string',
    //'street'=> 'required|string'
    //'location_id' => 'required|integer',
  //  'company_id' => 'required|integer',
]);
        
        /*$flig->company_id = $company_id;
        $flig->location_id = $location_id;
        $flig->Images = $Images;
        $flig->Name = $Name;
        $flig->available_cities = $available_cities;
        $flig->books_types = $books_types;
        $flig->Available_features = $Available_features;
        $flig->flight_costs_and_offers = $flight_costs_and_offers;
        $flig->Policies_requirements = $Policies_requirements;
     */
    //$token = PersonalAccessToken::where('token', $hashedToken)->first();
     //$token = PersonalAccessToken::findToken($hashedTooken);
    // $token = currentAccessToken()->user();
    //$user1 = $token->tokenable;
    

    $flig = flightCompany::create([
        'Images' => $fields['Images'],
        'email' => $fields['email'],
        'Name' => $fields['Name'],
        'available_cities' => $fields['available_cities'],
        'books_types' => $fields['books_types'],
        'Available_features' => $fields['Available_features'],
        'flight_costs_and_offers' => $fields['flight_costs_and_offers'],
        'Policies_requirements' => $fields['Policies_requirements'],
        //'location_id' => $fields['location_id'],
        //'company_id' =>  $fields['company_id'], 
          
    ]);
    $city = $req->input('city');
    $street = $req->input('street');
     $location->city = $city;
      $location->street = $street;
      $location->save();
 
  $location_id = DB::table('locations')->where('city','=',$city)->where('street','=',$street)->get('location_id');
  $flig->location_id = $location_id[0]->location_id;
  

        
        $getcomp = DB::table('companies')->where('email','=',$fields['email'])->get('company_id');
   // $getcompl = DB::table('locations')->where('email','=',$fields['email'])->get('location_id');
    $flig->company_id=$getcomp[0]->company_id;
    $flig->save();
   // $flig->location_id=$getcompl;  

    /*return response()->json([
            'Message'=> 'Success'
        ]);*/

        $response = [
           // 'user' => $user1,
           //'token' => $token
           'user'=> $flig,
           //'userl'=> $getcompl,

        ];

        return response($response, 201);
        
    }

public function editflightprofile(Request $req){
    $flig = new flightCompany;
           
    //$flightCompany_id = $req->input('flightCompany_id');
    $Images = $req->input('Images');
    $Name = $req->input('Name');
    $email = $req->input('email');
    $available_cities = $req->input('available_cities');
    $books_types = $req->input('books_types');
    $Available_features = $req->input('Available_features');
    $flight_costs_and_offers = $req->input('flight_costs_and_offers');
    $Policies_requirements = $req->input('Policies_requirements');
    //$location_id= $req->input('location_id');
    //$company_id= $req->input('company_id');
    $getcomp = DB::table('flight_companies')->where('email','=',$fields['email'])->get('flightCompany_id');
   // $getcompl = DB::table('locations')->where('email','=',$fields['email'])->get('location_id');
    $flig->company_id=$getcomp[0];
   // $flig->location_id=$getcompl[0];
    
    DB::table('flight_companies')->where('flightCompany_id',$$getcomp[0])->update(['Images'=>$Images,'Name'=>$Name,
    'available_cities'=>$available_cities,'books_types'=>$books_types,'Available_features'=>$Available_features,
    'flight_costs_and_offers'=>$flight_costs_and_offers,'Policies_requirements'=>$Policies_requirements]);
    return response()->json([
      "Message"=>"Updated"
    ]);
}
public function GetflightProfile(Request $req){
   // $flightCompany_id = $req->input('flightCompany_id');
   $email = $req->input('email');
   $getcomp = DB::table('flight_companies')->where('email','=',$fields['email'])->get('flightCompany_id');

   
   $getProf = DB::table('flight_companies')->where('flightCompany_id','=',$getcomp[0])->get();
    return response()->json([
       'info'=> $getProf
       ]);
    }
    public function getflightpostsbyid(Request $req){
        $flightCompany_id= $req->input('flightCompany_id');
       
        $getflightpost = DB::table('flightposts')->where('flightCompany_id','=',$flightCompany_id)->get();

        return response()->json([
          "Result"=>$getflightpost
        ]);
    }
    public function SearchflightCity(Request $req){
        $city= $req->input('city');
        $data = DB::table('flight_companies')
        ->join('locations', 'flight_companies.location_id', '=', 'locations.location_id')
        ->where('locations.city', $city)
        ->get();
    
        return response()->json([
            'city'=>$data
         ]);
    
    }
   
  public function GetAllflight(){
    $data = DB::table('flight_companies')
    ->join('locations', 'flight_companies.location_id', '=', 'locations.location_id')
    ->join('companies', 'flight_companies.company_id', '=', 'companies.company_id')
    
    ->get();


    
    return response()->json([
       'info'=> $data
       ]);
    }

}

