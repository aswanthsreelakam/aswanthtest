<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Admin\LoginController;
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

Route::group(['namespace'=>'Admin'],function(){
Route::get('home',['as'=>'home','uses'=>'AdminController@index'] );
Route::get('login',['as'=>'login','uses'=>'LoginController@login']);
Route::post('login', 'LoginController@dologin');
Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout'] );

Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('home',['as'=>'home','uses'=>'AdminController@index'] );
    Route::get('product-add',['as'=>'product.add','uses'=>'ProductController@show'] );

});
});   
