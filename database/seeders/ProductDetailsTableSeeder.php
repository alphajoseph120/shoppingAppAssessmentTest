<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_details')->insert([
            [
                'category_id' => 1,
                'product_name' => 'Blue Jeans Men',
                'product_price' => 1200,
                'product_image' => 'blue_jeans_men.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'product_name' => 'Strip Shirt Women',
                'product_price' => 999,
                'product_image' => 'strip_shirt_women.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'product_name' => 'Kurti Set',
                'product_price' => 1999,
                'product_image' => 'kurti_set.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'product_name' => 'Denim Skirt',
                'product_price' => 899,
                'product_image' => 'denim_skirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'product_name' => 'Formal Shirt Men',
                'product_price' => 1299,
                'product_image' => 'formal_shirt_men.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Mascara',
                'product_price' => 599,
                'product_image' => 'mascara.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Kajal',
                'product_price' => 399,
                'product_image' => 'kajal.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Lipstick',
                'product_price' => 499,
                'product_image' => 'lipstick.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Foundation',
                'product_price' => 1199,
                'product_image' => 'foundation.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Compact Powder',
                'product_price' => 599,
                'product_image' => 'compact_powder.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'product_name' => 'Earbuds',
                'product_price' => 1099,
                'product_image' => 'earbuds.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'product_name' => 'Smart Watch',
                'product_price' => 2599,
                'product_image' => 'smart_watch.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'product_name' => 'Charger',
                'product_price' => 599,
                'product_image' => 'charger.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'product_name' => 'Ring Light',
                'product_price' => 541,
                'product_image' => 'ring_light.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'product_name' => 'Mobile Case',
                'product_price' => 299,
                'product_image' => 'mobile_case.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'product_name' => 'Bedsheet',
                'product_price' => 599,
                'product_image' => 'bedsheet.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'product_name' => 'Hanging Plant',
                'product_price' => 699,
                'product_image' => 'hanging_plant.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'product_name' => 'Dinner Set',
                'product_price' => 1129,
                'product_image' => 'dinner_set.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'product_name' => 'Organizer',
                'product_price' => 449,
                'product_image' => 'organizer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'product_name' => 'Study Lamp',
                'product_price' => 252,
                'product_image' => 'study_lamp.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'product_name' => 'Dancing Catcus',
                'product_price' => 221,
                'product_image' => 'dancing_catcus.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'product_name' => 'Remote Control Car',
                'product_price' => 1599,
                'product_image' => 'remote_control_car.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'product_name' => 'Teddy Bear',
                'product_price' => 799,
                'product_image' => 'teddy_bear.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'product_name' => 'Earrings',
                'product_price' => 99,
                'product_image' => 'earrings.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'product_name' => 'Nosepin',
                'product_price' => 49,
                'product_image' => 'nosepin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
