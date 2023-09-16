<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function payment(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $response = \Stripe\Checkout\Session::create([
            "line_items" => [
                [
                    "price_data" => [
                        "currency" => "usd",
                        "product_data" => [
                            "name" => "apple watch",
                        ],
                        "unit_amount" => $request->price * 100,
                    ],
                    "quantity" => 1,
                ]
            ],
            "mode" => "payment",
            "success_url" => route("stripe.success"),
            "cancel_url" => route("stripe.cancel"),
        ]);

        // dd($response);
        return redirect()->away($response->url);
    }
    public function success()
    {
        dd("successfuly completed ✅");
    }
    public function cancel()
    {
        dd("payment failed 😑");
    }
}
