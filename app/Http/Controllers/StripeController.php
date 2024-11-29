<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * Create a Stripe Checkout session.
     */
    public function checkout() { 
        return view('checkout');
    }
    public function session(Request $request)
    {   
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $villa_id = $request->get('villaid');
        $prix = $request->get('total');
        $villa_name = $request->get('villaname');

        // Create a Stripe session
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $villa_name,
                            'description' => "Villa rental for {$villa_name}",
                        ],
                        'unit_amount' => $prix * 100, // Convert to cents
                    ],
                    'quantity' => 1, // Adjust this if you want multiple units
                ],
            ],
            'mode'  => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    /**
     * Show the success page after payment.
     */
    public function success()
    {
        return "Thank you for your payment!";
    }
}
