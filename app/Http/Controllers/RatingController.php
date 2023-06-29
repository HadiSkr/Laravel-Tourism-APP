<?php

namespace App\Http\Controllers;
use DB;
use App\Models\rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function addRating(Request $req){
        $rat = new rating;
        $user_id = $req->input('user_id');
        $company_id = $req->input('company_id');
        $rating = $req->input('rating');
        
        $rat->rating = $rating;
        $rat->user_id = $user_id;
        $rat->company_id = $company_id;
        $user = DB::table('ratings')->where('user_id','=',$user_id)->where('company_id','=',$company_id)->get();
        if($user->isEmpty()){
          $rat->save();
        }
        return response()->json([
          'Message'=>'OK'
        ]);
    }
}

