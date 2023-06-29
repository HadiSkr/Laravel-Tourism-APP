<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use DB;
class LocationController extends Controller
{
    public function Addlocation(Request $req){
        $location = new location;
       
       
        //$location_id = $req->input('location_id ');
        $city = $req->input('city');
        //$email = $req->input('email');
        $street = $req->input('street');
    
      
     
        
        //$location->location_id = $location_id;
        $location->city = $city;
        $location->street = $street;
      //  $location->email = $email;

    
        $location->save();
        return response()->json([
            'Message'=> 'Success'
        ]);
}
public function GetlocationById(Request $req){
    $company_id = $req->input('location_id');
    $loc = DB::table('locations')->where('location_id','=',$location_id)->get('city','street');
    
    
    return response()->json([
        'location'=>$loc
     ]);

}
public function GetAlllocations(){
  
    $locationss = DB::table('locations')->get();
    
    
    return response()->json([
        'location'=>$locationss
     ]);

}
}