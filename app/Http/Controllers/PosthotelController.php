<?php

namespace App\Http\Controllers;

use App\Models\posthotel;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use DB;
class PosthotelController extends Controller
{
    public function AddPostHotel(Request $req){
        $pho = new posthotel;
       // $Post_Id = $req->input('Post_Id ');
       $fields = $req->validate([
        'image' => 'required|string',
        'price' => 'required|integer',
        'room_size' => 'required|string',
        'View' => 'required|string',
        'email' => 'required|string',
        'number_of_beds' => 'required|integer',
       'types_of_bed' => 'required|string',
        'policies_and_instructions' => 'required|string',
        'entertainment' => 'string',
        'Food_and_Drink' => 'required|string',
        'extra_options_fees' => 'required|string',
        'More' => 'string',
      //'Hotel_Id' => 'required|integer',

    ]);
    $Hotel_Id= $req->input('Hotel_Id');

    /*
        $image = $req->input('image');
        $room_size = $req->input('room_size');
        $room_size = $req->input('View');
        $number_of_beds= $req->input('number_of_beds');
        $types_of_bed  = $req->input('types_of_bed');
        $policies_and_instructions = $req->input('policies_and_instructions');
        $entertainment = $req->input('entertainment');
        $Food_and_Drink = $req->input('Food_and_Drink');
        $extra_options_fees = $req->input('extra_options_fees');
        $More= $req->input('More');
        $Hotel_Id= $req->input('Hotel_Id');
       */
      $pho = posthotel::create([
        'image' => $fields['image'],
        'price' => $fields['price'],
        'room_size' => $fields['room_size'],
        'More' => $fields['More'],
        'View' => $fields['View'],
        'email' => $fields['email'],
        'number_of_beds' => $fields['number_of_beds'],
        'types_of_bed' => $fields['types_of_bed'],
        'policies_and_instructions' => $fields['policies_and_instructions'],
        'entertainment' => $fields['entertainment'],
        'Food_and_Drink' => $fields['Food_and_Drink'],
        'extra_options_fees' => $fields['extra_options_fees'],
       // 'Hotel_Id' => $fields['Hotel_Id'],
       // 'company_id' => $fields['company_id'],
      // 'num_li' =>0,
       //'num_comm' => 0,

    ]);
    //$pho->Hotel_Id = $Hotel_Id;
    $pho->num_li = 0;
    $pho->num_comm = 0;
        //$pho->Post_Id = $Post_Id;
       /* $pho->image = $image;
        $pho->room_size = $room_size;
        $pho->View = $View;
        $pho->number_of_beds= $number_of_beds;
        $pho->types_of_bed= $types_of_bed;
        $pho->policies_and_instructions = $policies_and_instructions ;
        $pho->entertainment=  $entertainment ;
        $pho->Food_and_Drink= $Food_and_Drink;
        $pho->extra_options_fees = $extra_options_fees;
        $pho->More = $More;
        $pho->Hotel_Id = $Hotel_Id;
        $pho->num_li = 0;
        $pho->num_comm = 0;*/
       

        $getcomp = DB::table('hotels')->where('email','=',$fields['email'])->get('Hotel_Id');

        $pho->Hotel_Id =$getcomp[0]->Hotel_Id;

        $pho->save();

        return response()->json([
            'Message'=> 'Success',
            'Message'=>$getcomp
        ]);
    }


    public function editposthotel(Request $req){
        $pho = new posthotel;
               
        //$Post_Id = $req->input('Post_Id');
        $image = $req->input('image');
        $price = $req->input('price');
        $email = $req->input('email');
        $room_size = $req->input('room_size');
        $View = $req->input('View');
        $number_of_beds= $req->input('number_of_beds');
        $types_of_bed  = $req->input('types_of_bed');
        $policies_and_instructions = $req->input('policies_and_instructions');
        $entertainment = $req->input('entertainment');
        $Food_and_Drink = $req->input('Food_and_Drink');
        $extra_options_fees = $req->input('extra_options_fees');
        $More= $req->input('More');
       

        $getcomp = DB::table('posthotels')->where('email','=', $email)->get('Post_Id');

        
        DB::table('posthotels')->where('Post_Id',$getcomp)->update(['image'=>$image,'price'=>$price,'room_size'=>$room_size,
        'View'=>$View,'number_of_beds'=>$number_of_beds,'types_of_bed'=>$types_of_bed,
        'policies_and_instructions'=>$policies_and_instructions,'entertainment'=>$entertainment,'Food_and_Drink'=>$Food_and_Drink,
        'extra_options_fees'=>$extra_options_fees,'More'=>$More]);
        return response()->json([
          "Message"=>"Updated"
        ]);
    }
    
    public function deleteposthotel(Request $req){
       // $Post_Id = $req->input('Post_Id');
       $getcomp = DB::table('posthotels')->where('email','=',$fields['email'])->get('Post_Id');

       DB::table('posthotels')->where('Post_Id', '=', $getcomp)->delete();
            return response()->json([
                'Message'=>'Deleted'
            ]);
        } 
        public function GetposthotelById(Request $req){
            $Post_Id = $req->input('Post_Id');

               $post= DB::table('posthotels')->where('Post_Id', '=', $Post_Id)->get();
               $comments =DB::table('comments')->where('hotetPost_id', '=', $Post_Id)->get('comm');
                return response()->json([
                    'post'=>$post,
                    'comments' =>  $comments
                ]);
            }

/**public function GetposthotelById(Request $req){
            $flight_post_id = $req->input('Post_Id');
               $post= DB::table('posthotels')->where('Post_Id', '=', $Post_Id)->get();
               $comments =DB::table('comments')->where('hotetPost_id', '=', $Post_Id)->get('comm');
                return response()->json([
                    'post'=>$post,
                    'comments' =>$comments 
                ]);
            } */





}

