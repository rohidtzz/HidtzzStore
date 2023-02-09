<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'amount',
        'reference',
        'merchant_code',
        'status_message',
        'data',
        'paymentUrl',
        'user_id',
        'expired',
        'qr',
        'vaNumber',
        'fee',
        'type',
    ];

    // protected $fillable =
    // [
    //     'amount',
    //     'reference',
    //     'merchant_code',
    //     'status_message',
    //     'data',
    //     'paymentUrl',
    //     'user_id',
    //     'expired',
    //     'qr',
    //     'vaNumber',
    //     'customer_id',
    //     'product_code',
    //     'fee',
    //     'sign',
    //     'type',
    //     'code_product'
    // ];



    public function user(){
        return $this->belongsTo(User::class);
    }
}
