<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'ad'], function(){
    Route::get('/', 'IndexController')->name('admin.index');
    
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/{user}', 'EditController')->name('admin.user.edit');
        Route::patch('/update/{user}', 'UpdateController')->name('admin.user.update');
        Route::get('/create/user', 'CreateController')->name('admin.user.create');
        Route::post('/store', 'StoreController')->name('admin.user.store');
        Route::delete('/delete/{user}', 'DeleteController')->name('admin.user.delete');


    });
});

Route::get('/docs', function () {
    return view('swagger.index');
});
