<?php

namespace App\Http\Controllers;

use App\Models\flightpost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use DB;
class FlightpostController extends Controller
{
    public function Addflightpost(Request $req){ 
        $fligpo = new flightpost;
     /*  
       // $flight_post_id = $req->input('flight_post_id');
        $images = $req->input('images');
        $flying_from = $req->input('flying_from');
        $flying_to = $req->input('flying_to');
        $dates = $req->input('dates');
        $num_travellers = $req->input('num_travellers');
        $Timr_to_arrive = $req->input('Timr_to_arrive');
        $flightCompany_id = $req->input('flightCompany_id');
       // $class = $req->input('class');
*/
//$flying_from = $req->input('flying_from');
//$flying_to = $req->input('flying_to');
       $fields = $req->validate([
        'images' => 'required|string',
        'email' => 'required|string',
        'flying_from' => 'required|string',
        'flying_to' => 'required|string',
        'dates' => 'required|date',
        'num_travellers' => 'required|integer| min:1',//['required','integer','min:1']
        'Timr_to_arrive' => 'required|date',
       // 'flightCompany_id' => 'required|integer',
       
    ]);
       // $fligpo->flight_post_id = $flight_post_id;
        /*$fligpo->images = $images;
        $fligpo->flying_from = $flying_from;
        $fligpo->flying_to = $flying_to;
        $fligpo->dates = $dates;
        $fligpo->num_travellers = $num_travellers;
        $fligpo->Timr_to_arrive = $Timr_to_arrive;
        $fligpo->flightCompany_id = $flightCompany_id;
       // $fligpo->class = $class;
        $fligpo->num_li = 0;
        $fligpo->num_comm = 0;
*/
//$fligpo->flying_from = $flying_from;
//$fligpo->flying_to = $flying_to;
$fligpo->num_li = 0;
$fligpo->num_comm = 0;
$fligpo = flightpost::create([
    'dates' => $fields['dates'],
    'images' => $fields['images'],
    'flying_from' => $fields['flying_from'],
    'email' => $fields['email'],
    'flying_to' => $fields['flying_to'],
    
    'num_travellers' => $fields['num_travellers'],
    'Timr_to_arrive' => $fields['Timr_to_arrive'],
   // 'flightCompany_id' => $fields['flightCompany_id'],
       
]);

$getflightpo = DB::table('flight_companies')->where('email','=',$fields['email'])->get('flightCompany_id');
$fligpo->flightCompany_id=$getflightpo[0]->flightCompany_id;
$fligpo->save();
        return response()->json([
            'Message'=> 'Success',
        ]);
}

public function editflightpost(Request $req){
 
           
   //$flight_post_id = $req->input('flight_post_id');
    $images = $req->input('images');
    $flying_from = $req->input('flying_from');
    $flying_to = $req->input('flying_to');
    $dates = $req->input('dates');
    $dates = $req->input('email');
    $num_travellers = $req->input('num_travellers');
    $Timr_to_arrive = $req->input('Timr_to_arrive');

$getflightpo = DB::table('flightposts')->where('email','=',$fields['email'])->get('flight_post_id');


    DB::table('flightposts')->where('flight_post_id',$getflightpo[0])->update(['images'=>$images,'flying_from'=>$flying_from,
    'flying_to'=>$flying_to,'dates'=>$dates,'num_travellers'=>$num_travellers,
    'Timr_to_arrive'=>$Timr_to_arrive]);
    return response()->json([
      "Message"=>"Updated"
    ]);
}
public function deleteflightpostById(Request $req){
   // $flight_post_id = $req->input('flight_post_id');
   $email = $req->input('email');

   $getflightpo = DB::table('flightposts')->where('email','=',$fields['email'])->get('flight_post_id');

        DB::table('flightposts')->where('flight_post_id', '=', $getflightpo)->delete();
        return response()->json([
            'Message'=>'Deleted'
        ]);
    } 


    public function GetflightpostById(Request $req){
        $flight_post_id = $req->input('flight_post_id');
           $post= DB::table('flightposts')->where('flight_post_id', '=', $flight_post_id)->get();

           $comments =DB::table('comments')->where('flightCompanyPost_id', '=', $flight_post_id)->get('comm');
           $class =DB::table('classses')->where('flight_post_id', '=', $flight_post_id)->get();
            return response()->json([
                'post'=>$post,
                'comments' =>$comments ,
                'class' =>$class 
            ]);
        }

}


