@extends('layouts.master')
@section('title','checkout')
@section('head')
	<script src="https://js.stripe.com/v3/"></script>
	<script src="{{asset('js/stripe.js')}}"></script>
	<style>

		.StripeElement {
		height: 40px;
		padding: 10px 12px;
		width: 100%;
		color: #32325d;
		background-color: white;
		border: 1px solid transparent;
		border-radius: 4px;

		box-shadow: 0 1px 3px 0 #e6ebf1;
		-webkit-transition: box-shadow 150ms ease;
		transition: box-shadow 150ms ease;
		margin-bottom: 20px;
		}

		.StripeElement--focus {
		box-shadow: 0 1px 3px 0 #cfd7df;
		}

		.StripeElement--invalid {
		border-color: #fa755a;
		}

		.StripeElement--webkit-autofill {
		background-color: #fefde5 !important;
		}
	</style>
@endsection
@section('content')

	<header class="page-header">
		<h1>checkout</h1>
		<h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
	</header>

	<main class="checkout-page">
		<div class="container">
			<div class="checkout-form">
				<form action="{{route('stripecheckout')}}" id="payment-form" method="post">
					@csrf
					<div class="field">
						<label for="name">Name:</label>
						<input type="text" id="name" class="@error('name') has-error @enderror" name="name" placeholder="Dakshina" value="{{old('name') ? old('name') : auth()->user()->name}}">
						@error('name')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>
					<div class="field">
						<label for="email">Email:</label>
						<input type="email" id="email" class="@error('email') has-error @enderror" name="email" placeholder=" " value="{{old('email') ? old('email') : auth()->user()->email}}">
						@error('email')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>
					<div class="field">
						<label for="phone">Phone:</label>
						<input type="text" id="phone" class="@error('phone') has-error @enderror" name="phone" placeholder=" " value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
						@error('phone')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>
					<div class="field">
						<label for="country">Country:</label>
						<br />
						<select name="country" id="country">
							<option value="">--Select country---</option>
							<option value="India">india</option>
						</select>
						@error('country')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>
					<div class="field">
						<label for="address">Address:</label>
						<input type="text" id="address" class="@error('address') has-error @enderror" name="address" placeholder=" " value="{{old('address') ? old('address') : auth()->user()->address}}">
						@error('address')
							<span class="field-error">{{$message}}</span>
						@enderror
					</div>
					<input type="hidden" name="payment_method_id" id="payment_method_id" value="">
					<label>
						Card details
						<!-- placeholder for Elements -->
						<div id="card-element"></div>
					</label>
					<button class="btn btn-primary btn-block" type="submit" >Submit Payment</button>

				</form>
			</div>

		</div>
	</main>


	<script>
		const stripe = Stripe('pk_test_51N8I7NSJkSRA1FPFTnUXAx7rVjb5BlMDlU9u11pIqkyyLytN5LUrSkAwFXEpiW1YobawiltSDXwuLrWZTTwyOrAZ001ef3hlVF');

		const elements = stripe.elements();

		// Set up Stripe.js and Elements to use in checkout form
		const style = {
		base: {
			color: "#32325d",
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSmoothing: "antialiased",
			fontSize: "16px",
			"::placeholder": {
			color: "#aab7c4"
			}
		},
		invalid: {
			color: "#fa755a",
			iconColor: "#fa755a"
		},
		};

		const cardElement = elements.create('card', {style});
		cardElement.mount('#card-element');

		const form = document.getElementById('payment-form');

		form.addEventListener('submit', async (event) => {
		// We don't want to let default form submission happen here,
		// which would refresh the page.
		event.preventDefault();

		const result = await stripe.createPaymentMethod({
			type: 'card',
			card: cardElement,
			billing_details: {
			// Include any additional collected billing details.
			name: 'Jenny Rosen',
			},
		})

		stripePaymentMethodHandler(result);
		});

		const stripePaymentMethodHandler = async (result) => {
		if (result.error) {
			// Show error in payment form
		} else {
			document.getElementById('payment_method_id').value = result.paymentMethod.id;
			form.submit();
			
		}
		}
	</script>
@endsection