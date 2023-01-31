<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'cost',
        'status',
        'user_id',
        'transaction_id',
        'resi'
    ];
}

