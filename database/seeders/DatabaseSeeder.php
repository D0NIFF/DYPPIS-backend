<?php

namespace Database\Seeders;

use App\Models\ProductService\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ProductService\PlatformSeeder;
use Database\Seeders\ProductService\PlatformTypeSeeder;
use Database\Seeders\ProductService\ProductCategorySeeder;
use Database\Seeders\ProductService\ProductDeliverySeeder;
use Database\Seeders\ProductService\ProductPictureSeeder;
use Database\Seeders\ProductService\ProductResponseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(MediaStorageCategorySeeder::class);
        $this->call(PlatformTypeSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductDeliverySeeder::class);

        $this->call(ProductResponseSeeder::class);
        Product::factory(50)->create();
        $this->call(ProductPictureSeeder::class);

    }
}
