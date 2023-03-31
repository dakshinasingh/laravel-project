@extends('layouts.master')
@section('title','login')
@section('content')

<section class="login-page">
		<div class="login-form-box">
			<div class="login-title">Login</div>
			<div class="login-form">
				<form action="{{ route('login') }}" method="post">
					@csrf
					
					<div class="field">
						<label for="email">Email:</label>
						<input type="text" id="email" class="@error('email') has-error @enderror" name="email" placeholder="dakshinasingh@gmail.com">
						@error('email')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>
					<div class="field">
						<label for="password">Confirm:</label>
						<input type="password" id="password" class="@error('password') has-error @enderror" name="password" placeholder="******">
						@error('password')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>

				
					<div class="field">
						<button type="submit" class="btn btn-primary btn-block" >Login</button>
					</div>

				</form>
			</div>
		</div>
	</section>


		
@endsection