<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use DB;
class LikeController extends Controller
{

    public function GetIdUsersLikededOnHotelPost(Request $req){
        $hotetPost_id = $req->input('hotetPost_id');
        $allData = DB::table('likes')->where('hotetPost_id','=',$hotetPost_id)->get(['user_id']);
        return response()->json([
          "Result"=>$allData
        ]);
    }
    public function AddHotelPostLike(Request $req){
        $like = new like;
        $hotetPost_id = $req->input('hotetPost_id');
        $user_id = $req->input('user_id');
        $like->hotetPost_id = $hotetPost_id;
        $like->user_id = $user_id;
        $like->carsCompany_id = null;
        $like->flightCompanyPost_id = null;
        




        $user = DB::table('likes')->where('hotetPost_id','=',$hotetPost_id)->where('user_id','=',$user_id)->get();
        if($user->isEmpty()){
          $like->save();
          $li = DB::table('posthotels')->where('Post_Id','=',$hotetPost_id)->get('num_li');
          $li = ++$li[0]->num_li;
          DB::table('posthotels')->where('Post_Id','=',$hotetPost_id)->update(['num_li'=>$li]);    
        }
        if($user->isNotEmpty()){
          DB::table('likes')->where('hotetPost_id','=',$hotetPost_id)->where('user_id','=',$user_id)->delete();
          $li = DB::table('posthotels')->where('Post_Id','=',$hotetPost_id)->get('num_li');
          $li = --$li[0]->num_li;
          DB::table('posthotels')->where('Post_Id','=',$hotetPost_id)->update(['num_li'=>$li]);    
        }
        
        return response()->json([
          'Message'=>'OK'
        ]);
    }


    

    public function  GetIdUsersLikededOnFlightPost(Request $req){
      $flightCompanyPost_id = $req->input('flightCompanyPost_id');
      $allData = DB::table('likes')->where('flightCompanyPost_id','=',$flightCompanyPost_id)->get(['user_id']);
      return response()->json([
        "Result"=>$allData
      ]);
  }
  public function AddflightPostLike(Request $req){
      $like = new like;
      $flightCompanyPost_id = $req->input('flightCompanyPost_id');
      $user_id = $req->input('user_id');
      $like->flightCompanyPost_id = $flightCompanyPost_id;
      $like->user_id = $user_id;
      $like->carsCompany_id = null;
      $like->hotetPost_id = null;
    
     



      $user = DB::table('likes')->where('flightCompanyPost_id','=',$flightCompanyPost_id)->where('user_id','=',$user_id)->get();
      if($user->isEmpty()){
        $like->save();
        $li = DB::table('flightposts')->where('flight_post_id','=',$flightCompanyPost_id)->get('num_li');
        $li = ++$li[0]->num_li;
        DB::table('flightposts')->where('flight_post_id','=',$flightCompanyPost_id)->update(['num_li'=>$li]);  
      }
        if($user->isNotEmpty()){
          DB::table('likes')->where('flightCompanyPost_id','=',$flightCompanyPost_id)->where('user_id','=',$user_id)->delete();
          $li = DB::table('flightposts')->where('flight_post_id','=',$flightCompanyPost_id)->get('num_li');
          $li = --$li[0]->num_li;
          DB::table('flightposts')->where('flight_post_id','=',$flightCompanyPost_id)->update(['num_li'=>$li]);    
      }
      return response()->json([
        'Message'=>'OK'
      ]);
    }

 


  public function GetIdUsersLikededOnCarsPost(Request $req){
    $carsCompany_id = $req->input('carsCompany_id');
    $allData = DB::table('likes')->where('carsCompany_id','=',$carsCompany_id)->get(['user_id']);
    return response()->json([
      "Result"=>$allData
    ]);
}
public function AddCarsPostLike(Request $req){
    $like = new like;
    $carsCompany_id = $req->input('carsCompany_id');
    $user_id = $req->input('user_id');
    $like->carsCompany_id = $carsCompany_id;
    $like->user_id = $user_id;
    $like->flightCompanyPost_id = null;
    $like->hotetPost_id = null;
  
   
    $user = DB::table('likes')->where('carsCompany_id','=',$carsCompany_id)->where('user_id','=',$user_id)->get();
    if($user->isEmpty()){
      $like->save();
      $li = DB::table('carscompanyposts')->where('car_post_id','=',$carsCompany_id)->get('num_li');
      $li = ++$li[0]->num_li;
      DB::table('carscompanyposts')->where('car_post_id','=',$carsCompany_id)->update(['num_li'=>$li]);    
    }
    if($user->isNotEmpty()){
      DB::table('likes')->where('carsCompany_id','=',$carsCompany_id)->where('user_id','=',$user_id)->delete();
      $li = DB::table('carscompanyposts')->where('car_post_id','=',$carsCompany_id)->get('num_li');
      $li = --$li[0]->num_li;
      DB::table('carscompanyposts')->where('car_post_id','=',$carsCompany_id)->update(['num_li'=>$li]);    
    }
    
    return response()->json([
      'Message'=>'OK'
    ]);
}


}

