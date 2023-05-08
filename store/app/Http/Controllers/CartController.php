<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){
		$product = Product::findOrFail($id);
		$color = Color::findOrFail($request->color);

		$item = [
			'product' => $product,
			'quantity' => $request->quantity,
			'color' => $color
		];

		if(session()->has('cart'))
		{
			//add the item to cart that already exist
			$cart = session()->get('cart');
			$key = $this->checkItemInCart($item);

			if($key !=-1)
			{
				$cart[$key]['quantity'] += $request->quantity;
				session()->put('cart',$cart);
			}
			else{
				session()->push('cart',$item);
			}
			return back()->with('addedToCart','Success! Product  has been added to cart');
			//new item


		}else{
			session()->push('cart', $item);
		} 
	}
	public function checkItemInCart($item){
		foreach(session()->get('cart') as $key => $val){
			if($val['product']['id'] == $item['product']['id'] && $val['color']['id'] == $item['color']['id']){
				return $key;
			}
		}
		return -1;
	}
}
