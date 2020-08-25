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


//دي طريقه تانيه للتعريف
// as بتدي اسم للروت
// uses بتقوله الروت دا هيروح علي الكنترول كذا وداله كذا

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ShoppingController;

Route::get('/', [
    'uses'=>'FrontEndController@index' ,
    'as'=>'index'
]);
Route::get('/cart/delete/{product}' , [ShoppingController::class,'delete'])->name('cart.remove');
Route::get('/cart' , [ShoppingController::class , 'cart'])->name('cart')->middleware('auth');
Route::get('product.single/{product}' ,[FrontEndController::class,'singleProduct'])->name('product.single');
Route::POST('/cart/add/{product}' , [ShoppingController::class,'add_to_cart'])->name('cart.add')
->middleware('auth');
Route::resource('products','ProductsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('cart/increase/{id}/{qty}' , [FrontEndController::class , 'increase'])->name('cart.increase');;
Route::get('cart/decrease/{id}/{qty}' , [FrontEndController::class , 'decrease'])->name('cart.decrease');
Route::get('cart/checkout' , [CheckoutController::class,'index'])->name('cart.checkout')->middleware('auth');
Route::POST('/cart/checkout',[CheckoutController::class,'pay'])->name('cart.checkout')->middleware('auth');

