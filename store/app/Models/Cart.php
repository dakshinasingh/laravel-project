<?php

namespace App\Models;

class Cart 
{
    public function centsToPrice($cents){
		return $cents;
	}
	public static function unitPrice($item){
		return (new self)->centsToPrice($item['product']['price'])* $item['quantity'];
	}
	public static function totalAmount(){
		$total = 0;
		foreach(session('cart') as $item) {
			$total += self::unitPrice($item);
		}
		return $total;
	}
}
