<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use DB;
class ReservationController extends Controller
{

    public function ReservationRoom (Request $req){
        $reservation = new reservation;
        $Post_Id = $req->input('Post_Id');
        $user_id = $req->input('user_id');
        $ammount = $req->input('ammount');
       // $reservation_Start_Date = $req->input('reservation_Start_Date');
        //$reservation_End_Date = $req->input('reservation_End_Date');
        //$reservation_info = $req->input('reservation_info');

     
        $fields = $req->validate([
            'reservation_Start_Date' => 'required|date',
            'reservation_End_Date' => 'required|date',
            'reservation_info' => 'required|string',
        ]);
        $reservationin = reservations::create([
            'reservation_Start_Date' => $fields['reservation_Start_Date'],
            'reservation_End_Date' => $fields['reservation_End_Date'],
            'reservation_info' => $fields['reservation_info'],
           
        ]);

          
          $Hotel_Id = DB::table('posthotels')->where('Post_Id','=',$Post_Id)->get('Hotel_Id');
          $company_id =DB::table('hotels')->where('Hotel_Id','=',$Hotel_Id[0]->Hotel_Id)->get('company_id');   
          $CompanyAccountId =DB::table('company_accounts')->where('company_id','=',$company_id[0]->company_id)->get('CompanyAccountId'); 
          
          $UserAccountId = DB::table('user_accounts')->where('userid','=',$user_id)->get('UserAccountId');
         
          $reservation->UserAccountId = $UserAccountId[0]->UserAccountId;
          $reservation->ammount = $ammount;
        //  $reservation->reservation_Start_Date = $reservation_Start_Date;
          //$reservation->reservation_End_Date = $reservation_End_Date;
         // $reservation->reservation_info = $reservation_info;
          $reservation->CompanyAccountId = $CompanyAccountId[0]->CompanyAccountId;
          

          $balance =DB::table('company_accounts')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->get('balance');
          $balanceuser =DB::table('user_accounts')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->get('balance');
          if($balanceuser[0]->balance<$ammount){
          return response()->json([
            'Message'=>'Balance is not enough',
             'Balance '=>$balanceuser[0]->balance
          ]);
        }
        else{
          $balanceuser[0]->balance-=$ammount;
          $balance[0]->balance +=$ammount;
          DB::table('company_accounts')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->update(['balance'=>$balance[0]->balance]);
          DB::table('user_accounts')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->update(['balance'=>$balanceuser[0]->balance]);


          $reservation->save();
        return response()->json([
          'Message'=>'Booked successfully'
        ]);
    }}


    public function ReservationCar(Request $req){
      $reservation = new reservation;
      $car_post_id = $req->input('car_post_id');
      $user_id = $req->input('user_id');
      $ammount = $req->input('ammount');


      $fields = $req->validate([
        'reservation_Start_Date' => 'required|date',
        'reservation_End_Date' => 'required|date',
        'reservation_info' => 'required|string',
    ]);
    $reservationin = reservations::create([
        'reservation_Start_Date' => $fields['reservation_Start_Date'],
        'reservation_End_Date' => $fields['reservation_End_Date'],
        'reservation_info' => $fields['reservation_info'],
       
    ]);

     



      //$reservation_Start_Date = $req->input('reservation_Start_Date');
      //$reservation_End_Date = $req->input('reservation_End_Date');
      ///$reservation_info = $req->input('reservation_info');

        $company_id = DB::table('carscompanyposts')->where('car_post_id','=',$car_post_id)->get('company_id');
        $CompanyAccountId =DB::table('company_accounts')->where('company_id','=',$company_id[0]->company_id)->get('CompanyAccountId'); 

        $UserAccountId = DB::table('user_accounts')->where('userid','=',$user_id)->get('UserAccountId');
       
        $reservation->UserAccountId = $UserAccountId[0]->UserAccountId;
        $reservation->ammount = $ammount;
        //$reservation->reservation_Start_Date = $reservation_Start_Date;
        //$reservation->reservation_End_Date = $reservation_End_Date;
        //$reservation->reservation_info = $reservation_info;
        $reservation->CompanyAccountId = $CompanyAccountId[0]->CompanyAccountId;
        
        $balance =DB::table('company_accounts')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->get('balance');
        $balanceuser =DB::table('user_accounts')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->get('balance');
        if($balanceuser[0]->balance<$ammount){
        return response()->json([
          'Message'=>'Balance is not enough',
           'Balance '=>$balanceuser[0]->balance
        ]);
      }
      else{
        $balanceuser[0]->balance-=$ammount;
        $balance[0]->balance +=$ammount;
        DB::table('company_accounts')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->update(['balance'=>$balance[0]->balance]);
        DB::table('user_accounts')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->update(['balance'=>$balanceuser[0]->balance]);

        $reservation->save();
      return response()->json([
        'Message'=>'Booked successfully'
      ]);
  }}

    public function Reservationflight (Request $req){
        $reservation = new reservation;
        $flight_post_id = $req->input('flight_post_id');
        $user_id = $req->input('user_id');
        $ammount = $req->input('ammount');
      //  $reservation_Start_Date = $req->input('reservation_Start_Date');
       // $reservation_End_Date = $req->input('reservation_End_Date');
        //$reservation_info = $req->input('reservation_info');
  
        $fields = $req->validate([
            'reservation_Start_Date' => 'required|date',
            'reservation_End_Date' => 'required|date',
            'reservation_info' => 'required|string',
        ]);
        $reservationin = reservations::create([
            'reservation_Start_Date' => $fields['reservation_Start_Date'],
            'reservation_End_Date' => $fields['reservation_End_Date'],
            'reservation_info' => $fields['reservation_info'],
           
        ]);
      

        $reservation->ammount = $ammount;
       // $reservation->reservation_Start_Date = $reservation_Start_Date;
        //$reservation->reservation_End_Date = $reservation_End_Date;
        //$reservation->reservation_info = $reservation_info;
      
          
          $flightCompany_id = DB::table('flightposts')->where('flight_post_id','=',$flight_post_id)->get('flightCompany_id');
          $company_id =DB::table('flight_companies')->where('flightCompany_id','=',$flightCompany_id[0]->flightCompany_id)->get('company_id');   
          $CompanyAccountId =DB::table('company_accounts')->where('company_id','=',$company_id[0]->company_id)->get('CompanyAccountId'); 
          
          $UserAccountId = DB::table('user_accounts')->where('userid','=',$user_id)->get('UserAccountId');
      
          $reservation->CompanyAccountId = $CompanyAccountId[0]->CompanyAccountId;
          $reservation->UserAccountId = $UserAccountId[0]->UserAccountId;

          $balance =DB::table('company_accounts')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->get('balance');
          $balanceuser =DB::table('user_accounts')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->get('balance');
          if($balanceuser[0]->balance<$ammount){
          return response()->json([
            'Message'=>'Balance is not enough',
            'Balance '=>$balanceuser
          ]);
        }
        else{
          $balanceuser[0]->balance-=$ammount;
          $balance[0]->balance +=$ammount;
          DB::table('company_accounts')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->update(['balance'=>$balanceuser[0]->balance]);
          DB::table('user_accounts')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->update(['balance'=>$balanceuser[0]->balance]);


          $reservation->save();
        return response()->json([
          'Message'=>'Booked successfully'
        ]);
    }}



    public function getuserReservations(Request $req){
      $user_id= $req->input('user_id');
      
      $UserAccountId = DB::table('user_accounts')->where('userid','=',$user_id)->get('UserAccountId');
      $userReservations =DB::table('reservations')->where('UserAccountId','=',$UserAccountId[0]->UserAccountId)->get();
      return response()->json([
        "Result"=>$userReservations
      ]);
  }
  public function getcompanyReservations(Request $req){
    $company_id= $req->input('company_id');
    
    $CompanyAccountId = DB::table('company_accounts')->where('company_id','=',$company_id)->get('CompanyAccountId');
    $companyReservations =DB::table('reservations')->where('CompanyAccountId','=',$CompanyAccountId[0]->CompanyAccountId)->get();
    return response()->json([
      "Result"=>$companyReservations
    ]);
}


}
