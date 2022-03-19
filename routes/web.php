<?php

use Illuminate\Support\Facades\Route;

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


// Frontend Route
Route::group(['namespace'=>'App\Http\Controllers\frontend'], function(){
Route::get('/','ProductController@showHome')->name('index'); 
Route::get('/main-product','ProductController@showmainproduct')->name('mainproduct.show'); 
Route::get('/products','ProductController@showproducts')->name('products.show');
});

// Route::get('/', function () {
//     return view('frontend/welcome');
// });

Route::get('product', function () {
    return view('product');
});

Route::get('product-3',function (){
    return view('shop-3col');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Backend Routs
Route::group(['namespace'=>'App\Http\Controllers\backend'],function(){
    Route::get('/adminDashbord','AdminProductController@ViewDashbord')->name('adminDashbord');
    Route::get('/adminProduct','AdminProductController@ViewProduct')->name('adminProduct');
    Route::post('/p_upload','AdminProductController@uploadproduct')->name('p_upload');
});
