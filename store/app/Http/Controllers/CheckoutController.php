<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function stripecheckout(Request $request){
	
	\Stripe\Stripe::setApiKey("sk_test_51N8I7NSJkSRA1FPFluV4iwIqG0moTkrwFXfSUbERMSJuNdFyXyyQzvyeaI0APNVyRTXp5iXWDWLHcGSPcPpTirch00vBoRKgHy");

	$intent = null;
	try {
		if ($request->payment_method_id) {
			# Create the PaymentIntent
			$intent = \Stripe\PaymentIntent::create([
				'payment_method' => $request->payment_method_id,
				'amount' => Cart::totalAmount(),
				'currency' => 'usd',
				'confirmation_method' => 'manual',
				'confirm' => true,
			]);
		}
		if ($request->payment_intent_id) {
			$intent = \Stripe\PaymentIntent::retrieve(
				$request->payment_intent_id
			);
			$intent->confirm();
		}
	} catch (\Stripe\Exception\ApiErrorException $e) {
		# Display error on client
		echo json_encode([
		'error' => $e->getMessage()
		]);
	}
	return redirect()->route('success');
}}