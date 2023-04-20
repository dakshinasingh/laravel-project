@extends('layouts.master')
@section('title','account')
@section('content')
	account page
	<div class="accounts-page">
		<div class="container">
			@auth
			<form action="{{route('logout')}}">
				@csrf
				<button class="btn btn-primary" >Logout</button>	
			</form>
			@endauth
		</div>
	</div>
@endsection