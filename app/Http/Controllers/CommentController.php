<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use DB;
class CommentController extends Controller
{
  /*$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('carsCompany_id');
            $table->unsignedBigInteger('hotetPost_id');
            $table->unsignedBigInteger('flightCompanyPost_id');
*/

    public function addHotelPostComment(Request $req){
        $comment = new comment;
        $hotetPost_id = $req->input('hotetPost_id');
        $user_id = $req->input('user_id');
        $comm = $req->input('comm');
        $comment->hotetPost_id = $hotetPost_id;
        $comment->user_id = $user_id;
        $comment->comm = $comm;
        
        $comment->carsCompany_id = null;
        $comment->flightCompanyPost_id = null;
      
      
       
       // $user = DB::table('comments')->where('hotetPost_id','=',$hotetPost_id)->where('user_id','=',$user_id)->get();
       // if($user->isEmpty()){
          $comment->save();
          $com = DB::table('posthotels')->where('Post_Id','=',$hotetPost_id)->get('num_comm');
          $com = ++$com[0]->num_comm;
          DB::table('posthotels')->where('Post_Id','=',$hotetPost_id)->update(['num_comm'=>$com]);    
     //   }
        return response()->json([
          'Message'=>'OK'
        ]);
    }
    public function GetIdUsersCommentedOnHotelPost(Request $req){
      $hotetPost_id = $req->input('hotetPost_id');
      $allData = DB::table('comments')->where('hotetPost_id','=',$hotetPost_id)->get(['user_id']);
      return response()->json([
        "Result"=>$allData
      ]);
  }

  public function AddFlightPostComment(Request $req){
      $comment = new comment;
      $flightCompanyPost_id = $req->input('flightCompanyPost_id');
      $user_id = $req->input('user_id');
      $comm = $req->input('comm');
      $comment->comm = $comm;
      $comment->flightCompanyPost_id = $flightCompanyPost_id;
      $comment->user_id = $user_id;
      $comment->carsCompany_id = null;
      $comment->hotetPost_id = null;
 
        $comment->save();
        $li = DB::table('flightposts')->where('flight_post_id','=',$flightCompanyPost_id)->get('num_comm');
        $li = ++$li[0]->num_comm;
        DB::table('flightposts')->where('flight_post_id','=',$flightCompanyPost_id)->update(['num_comm'=>$li]);    
      
      return response()->json([
        'Message'=>'OK'
      ]);
  }
  public function GetIdUsersCommentedOnFlightPost(Request $req){
    $flightCompanyPost_id = $req->input('flightCompanyPost_id');
    $allData = DB::table('comments')->where('flightCompanyPost_id','=',$flightCompanyPost_id)->get(['user_id']);
    return response()->json([
      "Result"=>$allData
    ]);
}


public function AddCarsPostComment(Request $req){
    $comment = new comment;
    $carsCompany_id = $req->input('carsCompany_id');
    $user_id = $req->input('user_id');
    $comm = $req->input('comm');
    $comment->comm = $comm;
    $comment->carsCompany_id = $carsCompany_id;
    $comment->user_id = $user_id;
    $comment->flightCompanyPost_id = null;
    $comment->hotetPost_id = null;
  
      $comment->save();
      $li = DB::table('carscompanyposts')->where('car_post_id','=',$carsCompany_id)->get('num_comm');
      $li = ++$li[0]->num_comm;
      DB::table('carscompanyposts')->where('car_post_id','=',$carsCompany_id)->update(['num_comm'=>$li]);    
    
    return response()->json([
      'Message'=>'OK'
    ]);
}

public function GetIdUsersCommentedOnCarsPost(Request $req){
  $carsCompany_id = $req->input('carsCompany_id');
  $allData = DB::table('comments')->where('carsCompany_id','=',$carsCompany_id)->get(['user_id']);
  return response()->json([
    "Result"=>$allData
  ]);
}



}
