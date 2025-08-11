<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
class StripeController extends Controller
{

    public function charge(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => 5000,
                'currency' => 'usd',
                'source' => 'tok_visa',
                'description' => 'Payment test',
            ]);

            $user = auth()->user();
            $user->wallet->increment('balance', $request->amount);


            return response()->json([
                'message' => 'The balance has been added to your wallet.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}


