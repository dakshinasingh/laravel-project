<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;

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

Route::get('/success',[pagesController::class,'success'])->name('success');
Route::get('/',[pagesController::class,'home'])->name('home');

Route::get('/cart',[pagesController::class,'Cart'])->name('cart');
Route::get('/wish-list',[pagesController::class,'wishlist'])->name('wishlist');
Route::get('/account',[pagesController::class,'account'])->name('account')->middleware('auth');
Route::get('/checkout',[pagesController::class,'checkout'])->name('checkout')->middleware('auth');
Route::get('/product/{id}',[pagesController::class,'product'])->name('product');
Route::post('/stripe-checkout',[CheckoutController::class,'stripecheckout'])->name('stripecheckout')->middleware('auth');


//Cart
Route::post('/add-to-cart/{id}',[CartController::class,'addToCart'])->name('addToCart');
Route::post('/remove-from-cart/{id}',[CartController::class,'removeFromCart'])->name('removeFromCart');

Route::post('/add-to-wishlist/{id}',[WishlistController::class,'post'])->name('addToWishlist')->middleware('auth');
Route::post('/remove-from-wishlist/{id}',[WishlistController::class,'remove'])->name('removeFromWishlist')->middleware('auth');



//Auth

Route::get('/login',[Authcontroller::class,'ShowLogin'])->name('login')->middleware('guest');
Route::get('/register',[Authcontroller::class,'ShowRegister'])->name('register')->middleware('guest');

Route::post('/register',[Authcontroller::class,'postRegister'])->name('register')->middleware('guest');
Route::post('/login',[Authcontroller::class,'postLogin'])->name('login')->middleware('guest');
Route::post('/logout',[Authcontroller::class,'logout'])->name('logout')->middleware('auth');


//admin panel routes
Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'],function(){
	Route::get('/',[AdminController::class,'dashboard'])->name('adminpanel');

	//products routes
	Route::group(['prefix' => 'products'],function(){
		Route::get('/',[ProductController::class,'index'])->name('adminpanel.products');
		Route::get('/create',[ProductController::class,'create'])->name('adminpanel.products.create');
		Route::post('/create',[ProductController::class,'store'])->name('adminpanel.products.store');
		Route::get('/{id}',[ProductController::class,'edit'])->name('adminpanel.products.edit');
		Route::put('/{id}',[ProductController::class,'update'])->name('adminpanel.products.edit');
		Route::delete('/{id}',[ProductController::class,'destroy'])->name('adminpanel.products.destroy');

	});
	Route::group(['prefix' => 'categories'],function(){
		Route::get('/',[CategoryController::class,'index'])->name('adminpanel.categories');
		Route::post('/',[CategoryController::class,'store'])->name('adminpanel.category.store');
		Route::delete('/{id}',[CategoryController::class,'destroy'])->name('adminpanel.category.destroy');
	});
	Route::group(['prefix' => 'colors'],function(){
		Route::get('/',[ColorController::class,'index'])->name('adminpanel.colors');
		Route::post('/',[ColorController::class,'store'])->name('adminpanel.color.store');
		Route::delete('/{id}',[ColorController::class,'destroy'])->name('adminpanel.color.destroy');
	});
	Route::group(['prefix' => 'orders'],function(){
		Route::get('/',[OrderController::class,'index'])->name('adminpanel.orders');
		Route::get('/{id}',[OrderController::class,'view'])->name('adminpanel.orders.view');
		Route::post('/{id}',[OrderController::class,'updateStatus'])->name('adminpanel.orders.status.update');

	});

});
