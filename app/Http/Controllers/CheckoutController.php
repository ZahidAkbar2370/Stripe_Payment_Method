<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51J5YscSIZzoPw4Zg1ntz48hgIMAFwbSxQHHAEZRGxSSwxzB7RCwHAffahvjy7CAAMkXYN64S0vYw45TMcTtfGr5y00nXeCkEqq');
        		
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Localhost',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}