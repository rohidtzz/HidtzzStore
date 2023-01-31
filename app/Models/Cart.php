<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =  [
        'qty',
        'subtotal',
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'id');
    }

    public function image()
    {
        return $this->BelongsTo(Product::class,'id');
    }

}
