<?php

namespace App\Http\Controllers;

use App\Models\carscompanypost;
use App\Models\location;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use DB;
class CarscompanypostController extends Controller
{
    
        public function Addcarpost(Request $req){
          //  $cars = new carscompanypost;
           
           // $car_post_id = $req->input('car_post_id');
          /*  $image = $req->input('image');
            $name = $req->input('name');
            $description = $req->input('description');
            $brand = $req->input('brand');
            $model_year = $req->input('model_year');
            $color = $req->input('color');
            $location_id= $req->input('location_id');
            $company_id= $req->input('company_id');
 */ $cars = new carscompanypost;
  $location  = new location;

 $fields = $req->validate([
    'name' => 'required|string',
    'email' => 'required|string',
    'brand' => 'required|string',
    'price' => 'required|integer',
   // 'company_id' => 'required|integer',
    'image' => 'required|string',
   'description' => 'required|string',
    'model_year' => 'required|integer',
    'color' => 'required|string',
    //'city'=> 'required|string',
    //'street'=> 'required|string'
    //  'location_id' => 'required|integer',

]);
$cars = carscompanypost::create([
    'name' => $fields['name'],
    'brand' => $fields['brand'],
    'price' => $fields['price'],
    'email' => $fields['email'],
    'description' => $fields['description'],
   // 'company_id' => bcrypt($fields['company_id']),
    'image' => $fields['image'],
    'model_year' => $fields['model_year'],
    'color' => $fields['color'],
    //'location_id' => $fields['location_id'],

]);
$city = $req->input('city');
$street = $req->input('street');
 $location->city = $city;
  $location->street = $street;
  $location->save();

$location_id = DB::table('locations')->where('city','=',$city)->where('street','=',$street)->get('location_id');
$cars->location_id = $location_id[0]->location_id;


    
    $getcomp = DB::table('companies')->where('email','=',$fields['email'])->get('company_id');
// $getcompl = DB::table('locations')->where('email','=',$fields['email'])->get('location_id');
$cars->company_id=$getcomp[0]->company_id;
$cars->save();
            return response()->json([
                'Message'=> 'Success',
                

            ]);
}

public function editcarpost(Request $req){
    $cars = new carscompanypost;
           
    $car_post_id = $req->input('car_post_id');
    $image = $req->input('image');
    $name = $req->input('name');
    $price = $req->input('price');
    $description = $req->input('description');
    $brand = $req->input('brand');
    $model_year = $req->input('model_year');
    $color = $req->input('color');
    



    DB::table('carscompanyposts')->where('car_post_id',$car_post_id)->update(['image'=>$image,'price'=>$price,'name'=>$name,
    'description'=>$description,'brand'=>$brand,'model_year'=>$model_year,
    'color'=>$color]);
    return response()->json([
      "Message"=>"Updated"
    ]);
}
public function SearchCarsCity(Request $req){
    $fields = $req->validate([
        'city' => 'required|string',]);
   // $city= $req->input('city');
    $data = DB::table('carscompanyposts')
    ->join('locations', 'carscompanyposts.location_id', '=', 'locations.location_id')
    ->where('locations.city',  $fields['city'])
    ->get();

    return response()->json([
        'Cars'=>$data
     ]);

}
public function GetAllCarposts(){
    
    $data = DB::table('carscompanyposts')
    ->join('locations', 'carscompanyposts.location_id', '=', 'locations.location_id')
    ->join('companies', 'carscompanyposts.company_id', '=', 'companies.company_id')
    
    ->get();


    
    return response()->json([
       'info'=> $data
       ]);
    }

    public function deleteCarpostById(Request $req){
        //$car_post_id = $req->input('car_post_id');
        $fields = $req->validate([
            'car_post_id' => 'required|string',]);
            DB::table('carscompanyposts')->where('car_post_id', '=', $fields['car_post_id'])->delete();
            return response()->json([
                'Message'=>'Deleted'
            ]);
        } 
        public function GetCarpostById(Request $req){
            $car_post_id = $req->input('car_post_id');
            $data =DB::table('carscompanyposts')->where('car_post_id', '=', $car_post_id)->get();
            $comments =DB::table('comments')->where('carsCompany_id', '=', $car_post_id)->get('comm');
                return response()->json([
                    'post'=>$data,
                    'comments'=>$comments

                   
                ]);
            }
}