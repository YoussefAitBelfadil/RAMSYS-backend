<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function processPayment(Request $request)
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Process payment here (Stripe, PayPal, etc.)
        // This is a placeholder for payment processing

        // Create order
        $order = $user->orders()->create([
            'total' => $total,
            'status' => 'completed'
        ]);

        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // Clear cart
        $user->cartItems()->delete();

        return redirect()->route('orders.show', $order)->with('success', 'Payment successful!');
    }
}
