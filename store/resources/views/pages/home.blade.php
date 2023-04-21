@extends('layouts.master')
@section('title','home')
@section('content')
	<main class="homepage">
		@include('pages.component.home.header')
		
		<section class="products-section">
			<div class="container">
				<h1 class="section-title">Featured Products</h1>
				<div class="products-row">
					@foreach($products as $product)
						<x-product-box :product="$product"/>
					@endforeach

				</div>
			</div>
		</section>
		
	</main>
@endsection