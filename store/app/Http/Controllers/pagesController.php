<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home(){
		$products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
		return view('pages/home',['products' => $products]);
	}
	public function cart(){
		return view('pages/cart');
	}
	public function wishlist(){
		return view('pages/wishlist');
	}
	public function account(){
		return view('pages/account');
	}

}
