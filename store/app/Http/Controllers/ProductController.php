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
		$products = Product::with('category','colors')->orderBy('created_at', 'desc')->get();
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
		// dd($request->all());
	//validate
		$request->validate([
			'title' => 'required|max:255',
			'category_id' => 'required',
			'colors' => 'required',
			'price' => 'required',
			// 'image' => 'required|values:jpeg,png,jpg,gif,svg'
		]);
		//store image
		$image_name = 'products/' . time() . rand(0,9999) . '.' . $request->image->getClientOriginalExtension();
		$request->image->storeAs('public' , $image_name);
		//store
		$product = Product::create([
			'title' => $request->title,
			'category_id' => $request->category_id,
			'price' => $request->price,
			'description' => $request->description,
			'image' => $image_name
		]);

		$product->colors()->attach($request->colors);
		//return request

		return back()->with('success','Product created successfully');
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
		Product::findOrfail($id)->delete();
		return back()->with('success','Product deleted successfully');
	}
}
