<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_category')->insert([
            [
                'category_name' => 'Clothing',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'category_name' => 'Beauty Essentials',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'category_name' => 'Gadgets',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'category_name' => 'Home',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'category_name' => 'Toys',
                'created_at'    => now(),
                'updated_at'    => now(),
            ], 
            [
                'category_name' => 'Jewellery',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
