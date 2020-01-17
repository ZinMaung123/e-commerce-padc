<?php

namespace App\Http\Middleware;

use Closure;


class CheckCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()){
            $customer = auth()->user();
            // $carts = \App\Cart::where('customer_id',$customer->id)->get();            
            if($customer->active_cart == null){
                // factory(\App\Cart::class)->create(['customer_id'=>$customer->id]);
                
                // $cart = new \App\Cart();
                // $cart->customer_id = $customer->id;
                // $cart->save();

                \App\Cart::create(['customer_id'=>$customer->id]);
            }            
        }

        return $next($request);
    }
}
