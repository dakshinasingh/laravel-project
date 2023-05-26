@extends('layouts.master')
@section('title','success')
@section('content')
	<header class="page-header">
		<h1>Order Successfully Placed</h1>
	</header>

	<section class="page-success">
		<div class="container">
			<h1>Your order has been successfully placed</h1>
			<h2>your order ID is: {{$order->id}}</h2>
		</div>
	</section>
@endsection




			
