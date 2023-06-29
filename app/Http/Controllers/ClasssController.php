<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;
use DB;
class ClasssController extends Controller
{
    public function Addclass(Request $req){
        $Cl = new Classs;
       
       
        $Booking_type = $req->input('Booking_type');
        $cost = $req->input('cost');
        $flight_post_id = $req->input('flight_post_id');

        
        $Cl->Booking_type = $Booking_type;
        $Cl->cost = $cost;
        $Cl->flight_post_id = $flight_post_id;
    
        $Cl->save();
        return response()->json([
            'Message'=> 'Success'
        ]);
}
public function GetAllflightclasses(){
    $re= DB::table('classses')->get();
    return response()->json([
       'info'=> $re
       ]);
    }

}
