<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
      'cart_id',
      'customer_id',
      'total_cost'
    ];

    public function transaction_details(){
      return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
