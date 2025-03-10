<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = ['cart_id', 'product_id', 'quantity', 'total_price'];

    public function product()
    {
        return $this->belongsTo(ProductDetails::class);
    }
}
