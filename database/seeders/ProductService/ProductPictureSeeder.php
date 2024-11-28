<?php

namespace Database\Seeders\ProductService;

use App\Models\ProductService\Product;
use Illuminate\Database\Seeder;
use Predis\Command\Traits\DB;

class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIds = Product::all()->pluck('id')->toArray();

        foreach ($productIds as $productId) {
            \Illuminate\Support\Facades\DB::table('product_pictures')->insert([
                'product_id' => $productId,
                'image_id' => '8fc30529-3329-4918-a836-15fda5d54b5a'
            ]);
            \Illuminate\Support\Facades\DB::table('product_pictures')->insert([
                'product_id' => $productId,
                'image_id' => 'dae099e0-1518-425f-be75-5e7cc9fe3995'
            ]);
        }
    }
}
