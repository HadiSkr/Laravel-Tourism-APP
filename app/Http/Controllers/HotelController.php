<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use App\Models\location;
use Illuminate\Http\Request;
use DB;
class HotelController extends Controller
{
    public function hotelprof(Request $req){
        $ho = new hotel;
        $location  = new location;

        //$userId = $req->input('userid');
        $fields = $req->validate([
            'name' => 'required|string',
            'images' => 'required|string',
            'email' => 'required|string',
            'popular' => 'required|string',
            'property' => 'required|string',
           'Room' => 'required|string',
            'Payments' => 'required|string',
            'check' => 'required|string',
            'policies' => 'required|string',
            'childrene' => 'required|string',
            'optional' => 'required|string',
           // 'city'=> 'required|string',
           // 'street'=> 'required|string'
            //'location_id' => 'required|integer',
           // 'company_id' => 'required|integer',

        ]);/*
        $name = $req->input('name');
        $images = $req->input('images');
        $popular = $req->input('popular_amenities');
        $property= $req->input('property_amenities');
        $Room  = $req->input('Room_amenities');
        $Payments = $req->input('Payments_type');
        $check = $req->input('check_in_out_times');
        $policies = $req->input('policies_and_instructions');
        $childrene = $req->input('children_and_extra_beds');
        $optional_extras_and_fees= $req->input('optional_extras_and_fees');
        $location_id= $req->input('location_id');
        $company_id= $req->input('company_id');
 
        */
        $ho = hotel::create([
            'name' => $fields['name'],
            'images' => $fields['images'],
            'email' => $fields['email'],
            'property_amenities' => $fields['property'],
            'optional_extras_and_fees' => $fields['optional'],
            'popular_amenities' => $fields['popular'],
            'Room_amenities' => $fields['Room'],
            'Payments_type' => $fields['Payments'],
            'check_in_out_times' => $fields['check'],
            'policies_and_instructions' => $fields['policies'],
            'children_and_extra_beds' => $fields['childrene'],
           // 'location_id' => $fields['location_id'],
            //'company_id' => $fields['company_id'],

        ]);
        
        $city = $req->input('city');
        $street = $req->input('street');
         $location->city = $city;
          $location->street = $street;
          $location->save();
     
      $location_id = DB::table('locations')->where('city','=',$city)->where('street','=',$street)->get('location_id');
      $ho->location_id = $location_id[0]->location_id;
      
    
            
            $company_id = DB::table('companies')->where('email','=',$fields['email'])->get('company_id');
       // $getcompl = DB::table('locations')->where('email','=',$fields['email'])->get('location_id');
        $ho->company_id=$company_id[0]->company_id;
        $ho->save();

        


       // $ho->location_id=$getcompl;
    
        return response()->json([
            'Message'=> 'Success',

        ]);
    }
    public function edithotelprofile(Request $req){
        $ho = new hotel;
       // $Hotel_Id = $req->input('Hotel_Id');     
        $name = $req->input('name');
        $images = $req->input('images');
        $popular_amenities = $req->input('popular_amenities');
        $property_amenities= $req->input('property_amenities');
        $Room_amenities  = $req->input('Room_amenities');
        $Payments_type = $req->input('Payments_type');
        $check_in_out_times = $req->input('check_in_out_times');
        $policies_and_instructions = $req->input('policies_and_instructions');
        $children_and_extra_beds = $req->input('children_and_extra_beds');
        $optional_extras_and_fees= $req->input('optional_extras_and_fees');
        $location_id= $req->input('location_id');
        $company_id= $req->input('company_id');
    
        
        $getcomp = DB::table('hotels')->where('email','=',$fields['email'])->get('Hotel_Id');


        DB::table('hotels')->where('Hotel_Id',$getcomp)->update(['name'=>$name,'images'=>$images,
        'popular_amenities'=>$popular_amenities,'property_amenities'=>$property_amenities,'Room_amenities'=>$Room_amenities,
        'Payments_type'=>$Payments_type,'check_in_out_times'=>$check_in_out_times,'policies_and_instructions'=>$policies_and_instructions,'children_and_extra_beds'=>$children_and_extra_beds,'optional_extras_and_fees'=>$optional_extras_and_fees,'location_id'=>$location_id,'company_id'=>$company_id]);
        return response()->json([
          "Message"=>"Updated"
        ]);
    }
    
    public function Gethotelprof(Request $req){
       // $Hotel_Id = $req->input('Hotel_Id');
       $getcomp = DB::table('hotels')->where('email','=',$fields['email'])->get('Hotel_Id');

        $getProf = DB::table('hotels')->where('Hotel_Id','=',$getcomp)->get();
        return response()->json([
           'info'=> $getProf
           ]);
        }
        public function gethotelpostsbyid(Request $req){
            $Hotel_Id= $req->input('Hotel_Id');
            
            $gethotelpost = DB::table('posthotels')->where('Hotel_Id','=',$Hotel_Id)->get();
            
            return response()->json([
              "Result"=>$gethotelpost
            ]);
        }

        public function SearchHotelsByCity(Request $req){
            $city= $req->input('city');
            $hotelsdata = DB::table('hotels')
            ->join('locations', 'hotels.location_id', '=', 'locations.location_id')
            ->where('locations.city', $city)
            ->get();
    
            return response()->json([
                'restaurants'=>$hotelsdata
             ]);
        
        }
        
        public function GetAllhotels(){
            
            $data = DB::table('hotels')
            ->join('locations', 'hotels.location_id', '=', 'locations.location_id')
            ->join('companies', 'hotels.company_id', '=', 'companies.company_id')
            
            ->get();
    
    
            
            return response()->json([
               'info'=> $data
               ]);
            }
        
}

