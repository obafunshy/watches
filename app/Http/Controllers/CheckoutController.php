<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $baskets = Basket::where('user_id', auth()->id())->with('product')->get();
        return view('checkout', compact('baskets'));
    }
}
