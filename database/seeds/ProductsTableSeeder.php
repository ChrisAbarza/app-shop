<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // model factories
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();
    }
}
