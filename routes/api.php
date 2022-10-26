<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
    Route::get('/', 'IndexController');
    Route::post('/activate', 'RegisterUserController');
    Route::get('/{user}', 'GetUserController');
    
    Route::middleware('userApi:api')->post('/{user}/update', 'UpdateUserController');
    
});

Route::group(['namespace'=>'WorkingTime', 'prefix' => 'time'], function(){
    Route::middleware('userApi:api')->post('/{user}/setTime', 'StoreController');
    Route::middleware('userApi:api')->delete('/{time}/deleteTime', 'DeleteController');
    Route::middleware('userApi:api')->get('/{user}/getTime', 'GetController');
});

Route::group(['namespace' => 'Booking', 'prefix' => 'booking'], function(){
    Route::post('/{user}', 'StoreController');
    Route::get('/{user}/getTime', 'GetTimesController');
    Route::middleware('userApi:api')->get('/{user}/getBooks', 'GetBooksController');
    Route::middleware('userApi:api')->delete('/{user}/deleteBooks', 'DeleteBooksController');
    Route::middleware('userApi:api')->patch('/{user}/{book}/changeStatus', 'ChangeStatusController');
    Route::middleware('userApi:api')->delete('/{user}/{book}/deleteBook', 'DeleteBookController');

});
