<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	//displaying products table
    public function index(){
		$products = Product::all();
		return view('admin.pages.products.index',['Products' => $products]);
	}
	//create
    public function create(){
		$categories = Category::all();
		$colors = Color::all();
		return view('admin.pages.products.create',['categories' => $categories, 'colors' => $colors]);
	}
	//store
    public function store(Request $request){
		return "save product";
	}
	//edit
    public function edit(){
		return "edit product";
	}
	//update
    public function update(){
		return "update product";
	}
	//destroy
    public function destroy($id){
		return "delete product";
	}
}
