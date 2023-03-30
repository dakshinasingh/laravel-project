@extends('layouts.master')
@section('title','login')
@section('content')
	<main class="homepage">
		@include('pages.component.home.header')
		
		<form action="{{route('logout')}}">
			@csrf
			<button class="btn btn-primary" >Logout</button>	
		</form>
		
	</main>
@endsection