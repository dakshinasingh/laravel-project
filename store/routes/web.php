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

Route::get('/login',[Authcontroller::class,'showLogin'])->name('login')->middleware('guest');
Route::get('/register',[Authcontroller::class,'showRegister'])->name('register')->middleware('guest');

Route::post('/register',[Authcontroller::class,'postRegister'])->name('register')->middleware('guest');
Route::post('/login',[Authcontroller::class,'postLogin'])->name('login')->middleware('guest');

Route::get('/logout',[Authcontroller::class,'logout'])->name('logout')->middleware('auth');

