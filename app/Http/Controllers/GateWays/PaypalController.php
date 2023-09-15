<?php

namespace App\Http\Controllers\GateWays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    //
    public function payment(Request $request)
    {

        $provider = new PayPalClient;

        $provider->setApiCredentials(config("paypal"));

        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => "d9f80740-38f0-11e8-b467-0ed5f89f718b",
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price,
                    ]
                ]
            ],
            "payment_source" => [
                "paypal" => [
                    "experience_context" => [
                        "payment_method_preference" => "IMMEDIATE_PAYMENT_REQUIRED",
                        "brand_name" => "my store INC",
                        "locale" => "en-US",
                        "landing_page" => "LOGIN",
                        "user_action" => "PAY_NOW",
                        "return_url" => route("paypal.success"),
                        "cancel_url" => route("paypal.cancel"),
                    ]
                ]
            ]
        ]);

        // dd($response);

        if (isset($response['id']) && $response['id'] !== null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === "payer-action") {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect(route("paypal.cancel"));
        }

        // dd($response);
    }
    public function success(Request $request)
    {

        $provider = new PayPalClient;

        $provider->setApiCredentials(config("paypal"));

        $paypalToken = $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if ($response['status'] && $response['status'] === "COMPLETED") {
            return "payment successful ✔️";
        }

        return redirect(route("paypal.cancel"));
    }
    public function cancel(Request $request)
    {
        dd("payment failed 😑");
    }
}
