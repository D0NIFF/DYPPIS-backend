<?php

namespace Database\Seeders\ProductService;

use App\Models\MediaStorage\MediaStorage;
use App\Models\ProductService\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mediaStorageImages = [
            [
                'id' => '16236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'microsoft-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '26236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'google-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '36236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'steam-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '46236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'epic-games-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '56236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'origin-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '66236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'youtube-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '76236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'jetbrains-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '86236c29-d7da-56f9-88df-40dfde284a26',
                'file_name' => 'adobe-logo.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
        ];

        $platforms = [
            [
                'id' => '1a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'microsoft',
                'title' => 'Microsoft',
                'type_id' => '2734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '16236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '2a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'google',
                'title' => 'Google',
                'type_id' => '2734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '26236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '3a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'steam',
                'title' => 'Steam',
                'type_id' => '3734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '36236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '4a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'epic-games',
                'title' => 'Epic Games',
                'type_id' => '3734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '46236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '5a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'origin',
                'title' => 'Origin',
                'type_id' => '3734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '56236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '6a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'youtube',
                'title' => 'YouTube',
                'parent_id' => '2a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'type_id' => '3734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '66236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '7a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'jetbrains',
                'title' => 'Jetbrains',
                'type_id' => '2734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '76236c29-d7da-56f9-88df-40dfde284a26',
            ],
            [
                'id' => '8a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                'slug' => 'adobe',
                'title' => 'Adobe',
                'type_id' => '2734e074-be9c-315f-a1df-31837290482a',
                'image_id' => '86236c29-d7da-56f9-88df-40dfde284a26',
            ],
        ];

        MediaStorage::insert($mediaStorageImages);
        foreach ($platforms as $value)
        {
            Platform::insert($value);
        }
    }
}
