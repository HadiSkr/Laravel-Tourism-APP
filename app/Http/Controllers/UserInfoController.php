<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\user_info;
use DB;
class UserInfoController extends Controller
{
   /* public function UserRegister(Request $req){
        $user = new User_info;
       // $userid = $req->input('userid');
        $image = $req->input('image');
        //$address = $req->input('address');
        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $password = $req->input('password');
        $gender = $req->input('gender');
        $birthdate = $req->input('birthdate');
        
       // $user->userid = $userid;
        $user->image = $image;
        //$user->address = $address;
        $user->name = $name;
        $user->email = $email;
        $user->phone= $phone;
        $user->password = $password;
        $user->gender = $gender;
        $user->birthdate = $birthdate;
       

        $user->save();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }*/

 
    public function UserRegister(Request $req){
        $user = new User_info;
        $fields = $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'image' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'birthdate' => 'required|string',

        ]);
        //$user->address = $address;
        /*$user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->phone= $fields['phone'];
        $user->address= $fields['address'];
        $user->image= $fields['image'];
        $user->password = $fields['password'];
        $user->gender = $fields['gender'] ;
        $user->birthdate = $fields['birthdate']
        ;*/
      
         $user = user_info::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'image' => $fields['image'],
            'phone' => $fields['phone'],
            'gender' => $fields['gender'],
            'address' => $fields['address'],
            'birthdate' => $fields['birthdate']

         ]);
        

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    
    public function UserLogin(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = user_info::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        //$token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
           
             'user' => $user,
            'token' =>  $user->createToken(time())->plainTextToken,
        ];

        return response($response, 201);
    }



     
     public function GetuserById(Request $req){
        $userid = $req->input('userid');
        $getuser = DB::table('User_infos')->where('userid','=',$userid)->get();
        return response()->json([
           'info'=> $getuser
           ]);
        }
        public function GetAllusers(){
            $uss= DB::table('User_infos')->get();
            return response()->json([
               'info'=> $uss
               ]);
            }
        public function deleteuserById(Request $req){
        $userid = $req->input('userid');
            DB::table('User_infos')->where('userid', '=', $userid)->delete();
            return response()->json([
                'Message'=>'Deleted'
            ]);
        }   
        public function logout(Request $request) {
            auth()->user()->tokens()->delete();
    
            return [
                'message' => 'Logged out'
            ];
        }


}

