<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $userId = auth()->id();
        $product_id = $request->product_id;
        $qty = 1;
        $product = Product::findOrFail($product_id);

        $basket = Basket::where('product_id', $product_id)->where('user_id', $userId)->first();

        if(! $basket) {
           Basket::create([
            'product_id' => $product_id,
            'user_id' => $userId,
            'qty' => $qty,
            'price' => $product->sale_price
           ]);
        } else {
            $basket->qty += 1;
            $basket->price += $product->sale_price;
            $basket->save();
        }

        $basket_count = Basket::where('product_id', $product_id)->where('user_id', $userId)->count();

        return response()->json([
            'basket_count' => $basket_count,
        ], 201);
    }
}
