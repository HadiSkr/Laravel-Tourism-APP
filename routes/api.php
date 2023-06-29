<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserInfoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('user_logout','App\Http\Controllers\UserInfoController@logout');
    Route::delete('deleteuser','App\Http\Controllers\UserInfoController@deleteuserById');
    Route::post('CompanyLogout','App\Http\Controllers\CompanyController@logout');
    Route::post('Addcarpost','App\Http\Controllers\CarscompanypostController@Addcarpost');
    Route::put('editcarpost','App\Http\Controllers\CarscompanypostController@editcarpost');
    Route::put('editflightprofile','App\Http\Controllers\FlightCompanyController@editflightprofile');
    Route::post('flightProfile','App\Http\Controllers\FlightCompanyController@flightProfile');
    Route::post('Addclass','App\Http\Controllers\ClasssController@Addclass');
    Route::put('editflightpost','App\Http\Controllers\FlightpostController@editflightpost');
    Route::post('addfolow','App\Http\Controllers\FollowController@addfolow');
    Route::post('Addlocation','App\Http\Controllers\LocationController@Addlocation');
    Route::post('hotelprof','App\Http\Controllers\HotelController@hotelprof');
    Route::put('edithotelprofile','App\Http\Controllers\HotelController@edithotelprofile');
    Route::post('AddPostHotel','App\Http\Controllers\PosthotelController@AddPostHotel');
    Route::delete('deleteposthotel','App\Http\Controllers\PosthotelController@deleteposthotel');
    Route::delete('deleteflightpostById','App\Http\Controllers\FlightpostController@deleteflightpostById');
    Route::delete('deleteCarpostById','App\Http\Controllers\CarscompanypostController@deleteCarpostById');
    Route::post('AddCarsPostLike','App\Http\Controllers\LikeController@AddCarsPostLike');
    Route::post('AddflightPostLike','App\Http\Controllers\LikeController@AddflightPostLike');
    Route::post('AddHotelPostLike','App\Http\Controllers\LikeController@AddHotelPostLike');
    Route::post('AddCarsPostComment','App\Http\Controllers\CommentController@AddCarsPostComment');
    Route::post('Addflightpost','App\Http\Controllers\FlightpostController@Addflightpost');
    Route::put('editposthotel','App\Http\Controllers\PosthotelController@editposthotel');
    Route::post('addRating','App\Http\Controllers\RatingController@addRating');
    Route::post('Addrestaurant','App\Http\Controllers\RestuarantController@Addrestaurant');
    Route::put('editrestaurantprofile','App\Http\Controllers\RestuarantController@editrestaurantprofile');
    Route::post('addHotelPostComment','App\Http\Controllers\CommentController@addHotelPostComment');
    Route::post('ReservationRoom','App\Http\Controllers\ReservationController@ReservationRoom');
    Route::post('createUserAccount','App\Http\Controllers\UserAccountController@createUserAccount');
    Route::post('createcompanyAccount','App\Http\Controllers\CompanyAccountController@createcompanyAccount');
    Route::post('ReservationCar','App\Http\Controllers\ReservationController@ReservationCar');
    Route::post('Reservationflight','App\Http\Controllers\ReservationController@Reservationflight');
    Route::post('getuserReservations','App\Http\Controllers\ReservationController@getuserReservations');
    Route::post('getcompanyReservations','App\Http\Controllers\ReservationController@getcompanyReservations');
    
});
//public routs

Route::post('/register','App\Http\Controllers\UserInfoController@UserRegister');
Route::post('user_login','App\Http\Controllers\UserInfoController@UserLogin');
Route::post('getUser','App\Http\Controllers\UserInfoController@GetuserById');
Route::get('GetAllusers','App\Http\Controllers\UserInfoController@GetAllusers');

Route::post('CompRegister','App\Http\Controllers\CompanyController@CompanyRegister');
Route::post('CompanyLogin','App\Http\Controllers\CompanyController@CompanyLogin');

Route::post('GetcompanyById','App\Http\Controllers\CompanyController@GetcompanyById');
Route::get('GetAllcompanys','App\Http\Controllers\CompanyController@GetAllcompanys'); 

Route::post('SearchCarsCity','App\Http\Controllers\CarscompanypostController@SearchCarsCity');
Route::get('GetAllCarposts','App\Http\Controllers\CarscompanypostController@GetAllCarposts');

Route::get('GetAllflight','App\Http\Controllers\FlightCompanyController@GetAllflight');
Route::post('GetflightProfile','App\Http\Controllers\FlightCompanyController@GetflightProfile');
Route::post('getflightpostsbyid','App\Http\Controllers\FlightCompanyController@getflightpostsbyid');
Route::post('SearchflightCity','App\Http\Controllers\FlightCompanyController@SearchflightCity');
Route::get('GetAllflightclasses','App\Http\Controllers\ClasssController@GetAllflightclasses');



Route::post('getfollowersIdBycompany_id','App\Http\Controllers\FollowController@getfollowersIdBycompany_id');
Route::get('GetAlllocations','App\Http\Controllers\LocationController@GetAlllocations');


Route::post('Gethotelprof','App\Http\Controllers\HotelController@Gethotelprof');

Route::get('GetAllhotels','App\Http\Controllers\HotelController@GetAllhotels');
Route::get('gethotelpostsbyid','App\Http\Controllers\HotelController@gethotelpostsbyid');
//1
Route::get('gethotelpostbyid','App\Http\Controllers\PosthotelController@GetposthotelById');

Route::get('getcarpostbyid','App\Http\Controllers\CarscompanypostController@GetCarpostById');
Route::get('getflightpostbyid','App\Http\Controllers\FlightpostController@GetflightpostById');






Route::get('Getrestaurantprofile','App\Http\Controllers\RestuarantController@Getrestaurantprofile');


Route::post('GetIdUsersCommentedOnHotelPost','App\Http\Controllers\CommentController@GetIdUsersCommentedOnHotelPost');

Route::post('AddFlightPostComment','App\Http\Controllers\CommentController@AddFlightPostComment');
Route::post('GetIdUsersCommentedOnFlightPost','App\Http\Controllers\CommentController@GetIdUsersCommentedOnFlightPost');

Route::post('GetIdUsersCommentedOnCarsPost','App\Http\Controllers\CommentController@GetIdUsersCommentedOnCarsPost');


Route::post('GetIdUsersLikededOnHotelPost','App\Http\Controllers\LikeController@GetIdUsersLikededOnHotelPost');

Route::post('GetIdUsersLikededOnFlightPost','App\Http\Controllers\LikeController@GetIdUsersLikededOnFlightPost');

Route::post('GetIdUsersLikededOnCarsPost','App\Http\Controllers\LikeController@GetIdUsersLikededOnCarsPost');





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
