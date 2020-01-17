<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store()
    {
        $activeCart = auth()->user()->active_cart;
        $cartItems = $activeCart->items
                                ->groupBy('product_id')
                                ->map(function($row){
                                    return $row->sum('qty');
                                });
        $totalCost = 0;

        $transaction = Transaction::create([
            'cart_id' => $activeCart->id,
            'customer_id' => $activeCart->customer_id,
            'total_cost' => $totalCost
        ]);

        foreach($cartItems as $key => $qty){
            $product = Product::find($key);
            $cost = $product->price * $qty;

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'cost' => $cost
            ]);

            $totalCost += $cost;
        }

        $transaction->total_cost = $totalCost;
        $transaction->update();

        $activeCart->completed_at = date('Y-m-d', time());
        $activeCart->update();

        return redirect()->route('checkout.info', [$transaction]);
    }

    public function showInfo(Transaction $transaction){
        $transaction->load('transaction_details', 'transaction_details.product');
        // dd($transaction->transaction_details);
        return view('checkout.info', compact('transaction'));
    }
}
