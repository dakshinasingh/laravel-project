<section class="product-box">
	<div class="image">
		<img src="{{asset('storage/' . $product->image)}}" alt="">
		@auth
			@if(auth()->user()->wishlist->contains($product))
				<form action="{{route('removeFromWishlist', $product->id)}}" method="post">
					@csrf 
					<button class="add-to-wishlist" type="submit">Remove from Wishlist</button>
				</form>
			@else
				<form action="{{route('addToWishlist', $product->id)}}" method="post">
					@csrf 
					<button class="add-to-wishlist" type="submit">Add to Wishlist</button>
				</form>
			@endif
		@endauth
	</div>
	<a href="{{route('product',$product->id)}}" >
	<div class="product-title">{{$product->title}}</div>
	<div class="color-platelets">
		@foreach($product->colors as $color)
			<div class="color-platelet" style="background: {{$color->code}}"></div>
			<!-- <div class="color-platelet" style='background: ".$color->code.";'></div> -->
		@endforeach
	</div>
	<div class="product-category">Chairs</div>
	<div class="product-price">2500</div>
	</a>
</section>