<?php

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



Auth::routes();


Route::middleware('cart.check')->group(function(){
    Route::get('/', function () {
        return redirect('/product');
    });
    
    Route::get('home', 'HomeController@index')->name('home');
    
    Route::resource('product','ProductController')->only(['index','show']);
    
    //Route::resource('shopping-cart','CartController')->only(['show']);

    Route::get('shopping-cart','CartController@show');

    Route::resource('cart-item','CartItemController')->only(['store','update','destroy']);

    Route::resource('checkout', 'CheckoutController')->only(['store']);

    Route::get('checkout/{transaction}/info', 'CheckoutController@showInfo')->name('checkout.info');
});

