<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class ProductCategory extends Model
{
    use HasFactory, Softdeletes;

    protected $table = 'products_category';
}
