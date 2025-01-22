<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class ProductDetails extends Model
{
    use HasFactory, Softdeletes;

    protected $table = 'product_details';

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
}
