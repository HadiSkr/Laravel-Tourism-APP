<?php

namespace App\Http\Controllers;

use App\Models\follow;
use Illuminate\Http\Request;
use DB;
class FollowController extends Controller
{
    public function addfolow(Request $req){
        $follow = new follow;
        $user_id = $req->input('user_id');
        $company_id = $req->input('company_id');
        $follow->user_id = $user_id;
        $follow->company_id = $company_id;
        $user = DB::table('follows')->where('user_id','=',$user_id)->where('company_id','=',$company_id)->get();
        if($user->isEmpty()){
          $follow->save();
          $fol = DB::table('companies')->where('company_id','=',$company_id)->get('num_folows');
          $fol = ++$fol[0]->num_folows;
          DB::table('companies')->where('company_id','=',$company_id)->update(['num_folows'=>$fol]);    
        }
        if($user->isNotEmpty()){
          DB::table('follows')->where('user_id','=',$user_id)->where('company_id','=',$company_id)->delete();
          $fol = DB::table('companies')->where('company_id','=',$company_id)->get('num_folows');
          $fol = --$fol[0]->num_folows;
          DB::table('companies')->where('company_id','=',$company_id)->update(['num_folows'=>$fol]);    
        }
        return response()->json([
          'Message'=>'OK'
        ]);
    }
    public function getfollowersIdBycompany_id(Request $req){
        $company_id = $req->input('company_id');
        $allfollowers = DB::table('follows')->where('company_id','=',$company_id)->get(['user_id']);
        return response()->json([
          "Result"=>$allfollowers
        ]);
    }


}


