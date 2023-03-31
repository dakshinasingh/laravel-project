@extends('layouts.master')
@section('title','home')
@section('content')
	<main class="homepage">
		@include('pages.component.home.header')
		@auth
		<form action="{{route('logout')}}">
			@csrf
			<button class="btn btn-primary" >Logout</button>	
		</form>
		@endauth
		
	</main>
@endsection