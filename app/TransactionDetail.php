<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';

    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'cost'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
