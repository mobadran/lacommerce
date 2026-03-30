<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->route('products.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->route('products.index');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'total_amount' => $total,
                'payment_method' => 'COD',
                'status' => 'pending',
            ]);

            foreach ($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $details['id'],
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
                
                $product = \App\Models\Product::find($details['id']);
                if ($product) {
                    $product->decrement('stock', $details['quantity']);
                }
            }

            session()->forget('cart');
            DB::commit();

            return redirect()->route('checkout.success')->with('order_id', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong during checkout. Please try again.');
        }
    }

    public function success()
    {
        if (!session('order_id')) {
            return redirect()->route('products.index');
        }

        return view('checkout.success');
    }
}
