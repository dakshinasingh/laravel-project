@extends('layouts.master')
@section('title','register')

@section('content')

<section class="login-page">
		<div class="login-form-box">
			<div class="login-title">Register</div>
			<div class="login-form">
				<form action="{{ route('register') }}" method="post">
					@csrf
					<div class="field">
						<label for="name">Name:</label>
						<input type="text" id="name" class="@error('name') has-error @enderror" name="name" placeholder="Dakshina">
						@error('name')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>

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
						<label for="password_confirmation">Confirm password:</label>
						<input type="password" id="password_confirmation" name="password_confirmation" placeholder="******">
					</div>
					<div class="field">
						<button type="submit" class="btn btn-primary btn-block" >Register</button>
					</div>

				</form>
			</div>
		</div>
	</section>
@endsection