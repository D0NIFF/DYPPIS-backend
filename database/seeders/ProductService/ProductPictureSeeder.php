<?php

namespace Database\Seeders\ProductService;

use App\Models\MediaStorage\MediaStorage;
use App\Models\ProductService\Product;
use App\Utils\UuidHelper;
use Illuminate\Database\Seeder;
use Predis\Command\Traits\DB;

class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'id' => '19626c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => '849f91a4-591a-4b6d-b3c3-679876dd3f47.jpg',
                'file_type' => 'image/jpg',
                'file_size' => 36864,
                'category_id' => '56295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '29626c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => '498db706-0276-4a4e-b551-6f2f0c0a6545.jpeg',
                'file_type' => 'image/jpeg',
                'file_size' => 36864,
                'category_id' => '56295c29-d7da-41e7-97df-40ffde284a93',
            ],
        ];

        MediaStorage::insert($images);
        $productIds = Product::all()->pluck('id')->toArray();

        foreach ($productIds as $productId) {
            \Illuminate\Support\Facades\DB::table('product_pictures')->insert([
                'id' => UuidHelper::generateUuid(),
                'product_id' => $productId,
                'image_id' => $images[0]['id'],
            ]);
            \Illuminate\Support\Facades\DB::table('product_pictures')->insert([
                'id' => UuidHelper::generateUuid(),
                'product_id' => $productId,
                'image_id' => $images[1]['id'],
            ]);
        }
    }
}
