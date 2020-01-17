<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['customer_id'];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getCartTotalPriceAttribute()
    {
        return $this->items->reduce(
            function ($carry, $item) {
                return $carry + $item->product->price;
            }
        );
    }

}
