<?php

namespace Database\Seeders;

use App\Models\MediaStorage\MediaStorageCategory;
use Illuminate\Database\Seeder;

class MediaStorageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => '06295c29-d7da-41e7-97df-40ffde284a93',
                'title' => 'Avatar',
                'slug' => 'avatar',
                'url' => '/storage/uploads/images/avatars',
                'path' => '/uploads/images/avatars',
            ],
            [
                'id' => '16295c29-d7da-41e7-97df-40ffde284a93',
                'title' => 'Banner',
                'slug' => 'banner',
                'url' => '/storage/uploads/images/banners',
                'path' => '/uploads/images/banners',
            ],
            [
                'id' => '26295c29-d7da-41e7-97df-40ffde284a93',
                'title' => 'Flag',
                'slug' => 'flag',
                'url' => '/storage/uploads/images/flags',
                'path' => '/uploads/images/flags',
            ],
            [
                'id' => '36295c29-d7da-41e7-97df-40ffde284a93',
                'title' => 'Icon',
                'slug' => 'icon',
                'url' => '/storage/uploads/images/icons',
                'path' => '/uploads/images/icons',
            ],
            [
                'id' => '46295c29-d7da-41e7-97df-40ffde284a93',
                'title' => 'Platform icon',
                'slug' => 'platform-icon',
                'url' => '/storage/uploads/images/platforms',
                'path' => '/uploads/images/platforms',
            ],
            [
                'id' => '56295c29-d7da-41e7-97df-40ffde284a93',
                'title' => 'Product background',
                'slug' => 'product-background',
                'url' => '/storage/uploads/images/products',
                'path' => '/uploads/images/products',
            ],
        ];

        MediaStorageCategory::insert($categories);
    }
}
