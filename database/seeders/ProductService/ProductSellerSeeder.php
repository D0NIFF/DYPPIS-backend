<?php

namespace Database\Seeders\ProductService;

use App\Models\ProductService\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();

        foreach ($products as $product)
        {
            DB::table('products_sellers')->insert([
                'product_id' => $product,
                'user_id' => $users[rand(0, count($users) - 1)],
            ]);
        }
    }
}
