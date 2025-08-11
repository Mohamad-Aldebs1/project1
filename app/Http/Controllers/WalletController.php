<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getWallet()
    {
        $user = auth()->user();

        $wallet = $user->wallet;

        return response()->json([
            'message1' => 'welcome ' . $user->first_name,
            'message2' => 'your balance ' . optional($wallet)->balance . '$',
        ]);
    }

}
