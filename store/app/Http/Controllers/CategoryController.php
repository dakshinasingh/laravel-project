<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
		dd(Category::all());
		return view('admin.pages.categories.index');
	}
	public function store(Request $request){
		//validate
		$request->validate([
			'name' => 'required|unique:categories|max:255'
		]);
		//store
		$category = new Category();
		$category->name = $request->name;
		$category->save();
		//return response
		return back()->with('success','Category Saved');
	}
}
