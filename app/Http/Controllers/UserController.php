<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getSetupIntent() {
        return auth()->user()->createSetupIntent();
    }

    public function getPaymentMethods() {
        $user = auth()->user();
        $methods = [];
        foreach($user->paymentMethods() as $method) {
            array_push($methods, [
                'id' => $method->id,
                'brand' => $method->card->brand,
                'last_four' => $method->card->last_four,
                'exp_month' => $method->card->exp_month,
                'exp_year' => $method->card->exp_year,
            ]);
        }

        return response()->json(['methods' => $methods]);
    }
}
