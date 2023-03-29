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
						<input type="text" id="name" name="name" placeholder="Dakshina">
					</div>

					<div class="field">
						<label for="email">Email:</label>
						<input type="text" id="email" name="email" placeholder="dakshinasingh@gmail.com">
					</div>
					<div class="field">
						<label for="password">Confirm:</label>
						<input type="password" id="password" name="password" placeholder="******">
					</div>

					<div class="field">
						<label for="password-confirmation">Confirm password:</label>
						<input type="password" id="password-confirmation" name="password-confirmation" placeholder="*******">
					</div>
					<div class="field">
						<button type="submit" class="btn btn-primary btn-block" >Register</button>
					</div>

				</form>
			</div>
		</div>
	</section>
@endsection