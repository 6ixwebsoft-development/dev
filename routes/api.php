<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:api']], function() {
	Route::post("/update_my_profile_pic",'UserController@UserProfile');
	Route::get("/user",function (Request $request) {
    	return ["status" => true, "data" => $request->user()];	
	});
	Route::group(['prefix' => 'post'], function() {
		Route::post("/add",'PostController@add');
		Route::post("/add/{id}",'PostController@videoadd');
		Route::post("/list",'PostController@show');
		Route::post("/list/{id}",'PostController@show');
		Route::post("/update/{id}",'PostController@update');
		Route::post("/delete/{id}",'PostController@destroy');
		Route::post("/status/{id}",'PostController@status');
		Route::post("/getToBeSend",'SendToAll@send');
	});
	Route::post("/addmessengers","UserController@messengers");
});

Route::post("/login","UserController@index");
Route::post("/register","UserController@store");
Route::post("/otp","UserController@UserActive");
Route::post("/reset","UserController@resetPassword");
Route::post("/reset/resend","UserController@resendemail");



