<a href="{{route('product',$product->id)}}" class="product-box">
	<div class="image">
		<img src="{{asset('storage/' . $product->image)}}" alt="">
	</div>
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