<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/',[\App\Http\Controllers\FrontProductListController::class,'index']);
Route::get('/','\App\Http\Controllers\FrontProductListController@index');
Route::get('/product/{id}','\App\Http\Controllers\FrontProductListController@show')->name('product.view');
Route::get('/category/{name}','\App\Http\Controllers\FrontProductListController@allProduct')->name('product.list');

Route::get('/addToCart/{product}','\App\Http\Controllers\CartController@addToCart')->name('add.cart');
Route::get('/cart','\App\Http\Controllers\CartController@showCart')->name('cart.show');
Route::post('/products/{product}','\App\Http\Controllers\CartController@updatecart')->name('cart.update');
Route::post('/product/{product}','\App\Http\Controllers\CartController@removeCart')->name('cart.remove');
Route::get('checkout/{amount}','\App\Http\Controllers\CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge','\App\Http\Controllers\CartController@charge')->name('cart.charge');
Route::get('/orders','\App\Http\Controllers\CartController@order')->name('order')->middleware('auth');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('subcategory', 'App\Http\Controllers\SubcategoryController');
    Route::resource('product', 'App\Http\Controllers\ProductController');
    Route::get('subcategories/{id}', [\App\Http\Controllers\ProductController::class, 'loadSubCategories']);
});



