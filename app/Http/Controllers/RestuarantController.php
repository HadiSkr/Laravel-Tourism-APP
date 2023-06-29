<?php

namespace App\Http\Controllers;

use App\Models\restuarant;
use Illuminate\Http\Request;
use App\Models\location;
use DB;
class RestuarantController extends Controller
{
    public function Addrestaurant(Request $req){
        $res = new restuarant;
        $location  = new location;

        $fields = $req->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'email' => 'required|string',
            'dietary_option' => 'required|string',
           // 'Cuisine' => 'required|string',
          // 'Serving' => 'required|string',
            'delivery_options' => 'required|string',
            'features' => 'string',
           // 'city'=> 'required|string',
           // 'street'=> 'required|string'
           // 'location_id' => 'required|integer',
           // 'company_id' => 'integer',
    
        ]);
       /*
        $name = $req->input('name');
        $image = $req->input('image');
        $dietary_option = $req->input('dietary_option');
        $Cuisine = $req->input('Cuisine');
        $Serving = $req->input('Serving');
        $features = $req->input('features');
        $delivery_options = $req->input('delivery_options');
        $location_id= $req->input('location_id');
        $company_id= $req->input('company_id');
 
        */
        /*
        $res->name = $name;
        $res->image = $image;
        $res->dietary_option = $dietary_option;
        $res->Cuisine = $Cuisine;
        $res->Serving = $Serving;
        $res->features = $features;
        $res->delivery_options = $delivery_options;
        $res->location_id = $location_id;
        $res->company_id = $company_id;*/
        $res = restuarant::create([
            'name' => $fields['name'],
            'image' => $fields['image'],
            'email' => $fields['email'],
            'dietary_option' => $fields['dietary_option'],
          //  'Cuisine' => $fields['Cuisine'],
           // 'Serving' => $fields['Serving'],
            'delivery_options' => $fields['delivery_options'],
            'features' => $fields['features'],
           // 'location_id' => $fields['location_id'],
           // 'company_id' => $fields['company_id'],
           
        ]);
        $Cuisine = $req->input('Cuisine');
        $Serving = $req->input('Serving');
        $city = $req->input('city');
        $street = $req->input('street');
        $res->Cuisine = $Cuisine;
        $res->Serving = $Serving;
         $location->city = $city;
          $location->street = $street;
          $location->save();

        $location_id = DB::table('locations')->where('city','=',$city)->where('street','=',$street)->get('location_id');
$res->location_id = $location_id[0]->location_id;
       

        $getcomp = DB::table('companies')->where('email','=',$fields['email'])->get('company_id');
       // $getcompl = DB::table('locations')->where('email','=',$fields['email'])->get('location_id');
        $res->company_id=$getcomp;
      //  $res->location_id=$getcompl;
      $res->save();
        return response()->json([
            'Message'=> 'Success',
        ]);
}
public function editrestaurantprofile(Request $req){
    $res = new restuarant;
    //$Restaurant_id = $req->input('Restaurant_id');
    $name = $req->input('name');
    $image = $req->input('image');
    $dietary_option = $req->input('dietary_option');
    $Cuisine = $req->input('Cuisine');
    $Serving = $req->input('Serving');
    $Serving = $req->input('email');
    $features = $req->input('features');
    $delivery_options = $req->input('delivery_options');
    //$location_id= $req->input('location_id');
    //$company_id= $req->input('company_id');


    
    $getcomp = DB::table('restuarants')->where('email','=',$fields['email'])->get('Restaurant_id');
   // $getcomp2 = DB::table('companies')->where('email','=',$fields['email'])->get('company_id');
    //$getcompl = DB::table('locations')->where('email','=',$fields['email'])->get('location_id');
   // $ho->company_id=$getcomp2;
  //  $ho->location_id=$getcompl;
    
    DB::table('restuarants')->where('Restaurant_id',$getcomp)->update(['name'=>$name,'image'=>$image,
    'dietary_option'=>$dietary_option,'Cuisine'=>$Cuisine,'Serving'=>$Serving,
    'features'=>$features,'delivery_options'=>$delivery_options]);
    return response()->json([
      "Message"=>"Updated"
    ]);
}
public function Getrestaurantprofile(Request $req){
    $namee = $req->input('name');
    $getProf = DB::table('restuarants')->where('name','=',$namee)->get();
    return response()->json([
       'info'=> $getProf
       ]);
    }
    public function SearchRestaurantsByCity(Request $req){
        $city= $req->input('city');
        $restuarantsdata = DB::table('restuarants')
        ->join('locations', 'restuarants.location_id', '=', 'locations.location_id')
        ->where('locations.city', $city)
        ->get();

        return response()->json([
            'restaurants'=>$restuarantsdata
         ]);
    
    }

    public function GetAllRestaurants(){
       
    
        $data = DB::table('restuarants')
        ->join('locations', 'restuarants.location_id', '=', 'locations.location_id')
        ->join('companies', 'restuarants.company_id', '=', 'companies.company_id')
        
        ->get();


        
        return response()->json([
           'info'=> $data
           ]);
        }
    
    

}
