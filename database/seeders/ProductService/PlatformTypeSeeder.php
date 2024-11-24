<?php

namespace Database\Seeders\ProductService;

use App\Models\MediaStorage\MediaStorage;
use App\Models\ProductService\PlatformType;
use Illuminate\Database\Seeder;

class PlatformTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mediaStorageImages = [
            [
                'id' => '16236c29-d7da-41e9-97df-40ffde284a93',
                'file_name' => 'games-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '26236c29-d7da-41e9-97df-40ffde284a93',
                'file_name' => 'software-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '36236c29-d7da-41e9-97df-40ffde284a93',
                'file_name' => 'social-apps-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '46236c29-d7da-41e9-97df-40ffde284a93',
                'file_name' => 'mobile-games-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
            ],
        ];

        $platformTypes = [
            [
                'id' => '1734e074-be9c-315f-a1df-31837290482a',
                'slug' => 'games',
                'title' => [
                    'en' => 'Games',
                    'fr' => 'Jeux',
                    'es' => 'Juegos',
                    'de' => 'Spiele',
                    'it' => 'Giochi',
                    'ru' => 'Игры'
                ],
                'image_id' => '16236c29-d7da-41e9-97df-40ffde284a93',
            ],
            [
                'id' => '2734e074-be9c-315f-a1df-31837290482a',
                'slug' => 'software',
                'title' => [
                    'en' => 'Software',
                    'fr' => 'Logiciel',
                    'es' => 'Software',
                    'de' => 'Software',
                    'it' => 'Software',
                    'ru' => 'Программное обеспечение'
                ],
                'image_id' => '26236c29-d7da-41e9-97df-40ffde284a93',
            ],
            [
                'id' => '3734e074-be9c-315f-a1df-31837290482a',
                'slug' => 'social-apps',
                'title' => [
                    'en' => 'Social networks & apps',
                    'fr' => 'Réseaux sociaux et apps',
                    'es' => 'Redes sociales y aplicaciones',
                    'de' => 'Soziale Netzwerke und Apps',
                    'it' => 'Reti sociali e app',
                    'ru' => 'Соцсети и сервисы'
                ],
                'image_id' => '36236c29-d7da-41e9-97df-40ffde284a93',
            ],
            [
                'id' => '4734e074-be9c-315f-a1df-31837290482a',
                'slug' => 'mobile-games',
                'title' => [
                    'en' => 'Mobile games',
                    'fr' => 'Jeux mobiles',
                    'es' => 'Juegos para móviles',
                    'de' => 'Mobile Spiele',
                    'it' => 'Giochi per cellulari',
                    'ru' => 'Мобильные игры'
                ],
                'image_id' => '46236c29-d7da-41e9-97df-40ffde284a93',
            ],
        ];

        MediaStorage::insert($mediaStorageImages);
        foreach ($platformTypes as $value)
        {
            $value['title'] = json_encode($value['title']);
            PlatformType::insert($value);
        }
    }
}
