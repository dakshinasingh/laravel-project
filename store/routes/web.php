<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\Authcontroller;

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

Route::get('/',[pagesController::class,'home'])->name('home');
Route::get('/cart',[pagesController::class,'Cart'])->name('cart');

//Auth

Route::get('/login',[Authcontroller::class,'ShowLogin'])->name('ShowLogin');
Route::get('/register',[Authcontroller::class,'ShowRegister'])->name('register');

