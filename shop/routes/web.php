<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductsController::class,'index']);

Auth::routes();

Route::resource('cart',CartsController::class);


Route::get('getcartitem',[CartsController::class,'getcartitem']);

Route::post('/payment', [CartsController::class,'payment']);
