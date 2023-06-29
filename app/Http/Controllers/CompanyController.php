<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use DB;
class CompanyController extends Controller
{
    
        public function CompanyRegister(Request $req){
            /*$comp = new company;
           
           // $image = $req->input('company id');
            $type = $req->input('type');
            $name = $req->input('name');
            $email = $req->input('email');
            $password = $req->input('password');
            $Commercial_record = $req->input('Commercial_record');
            $phone = $req->input('phone');
            $five_stars = $req->input('five_stars');
           

            
          //  $comp->image = $image;
            $comp->type = $type;
            $comp->name = $name;
            $comp->email = $email;
            $comp->password = $password;
            $comp->Commercial_record = $Commercial_record;
            $comp->phone = $phone;
            $comp->five_stars = $five_stars;
            $comp->num_folows = 0;

    


            $comp->save();


            $token = $comp->createToken('myapptoken')->plainTextToken;

            $response = [
                'comapny' => $comp,
                'token' => $token
            ];
    
            return response($response, 201);*/

            $user = new company;
            $fields = $req->validate([
                'type' => 'required|string',
                'email' => 'required|string|unique:email',
                'password' => 'required|string',
                'image' => 'required|string',
                'Commercial_record' => 'required|string',
                'name' => 'required|string',
                'phone' => 'required|string',
                //'num_folows' => 'required|string',
                'five_stars' => 'required|string',
    
            ]);
            $user->num_folows = 0;

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
          
             $user = company::create([
                'type' => $fields['type'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
                'image' => $fields['image'],
                'Commercial_record' => $fields['Commercial_record'],
                'name' => $fields['name'],
                'phone' => $fields['phone'],
              //  'num_folows' => $fields['num_folows'],
                'five_stars' => $fields['five_stars']
    
             ]);
    
            $token = $user->createToken('myapptoken')->plainTextToken;
    
            $response = [
                'user' => $user,
                'token' => $token
            ];
    
            return response($response, 201);
            
        }
        
        public function CompanyLogin(Request $req){
            $fields = $req->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);
    
            // Check email
            $user = company::where('email', $fields['email'])->first();
    
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
         public function GetcompanyById(Request $req){
            $company_id = $req->input('company_id');
            $getcomp = DB::table('companies')->where('company_id','=',$company_id)->get();
            return response()->json([
               'info'=> $getcomp
               ]);
            }

            public function GetAllcompanys(){
               
                $getcomp = DB::table('companies')->get();
                return response()->json([
                   'info'=> $getcomp
                   ]);
                }
               public function logout(Request $request) {
            auth()->user()->tokens()->delete();
    
            return [
                'message' => 'Logged out'
            ];
        }
    }



