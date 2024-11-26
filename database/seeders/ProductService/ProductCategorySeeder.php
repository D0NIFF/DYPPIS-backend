<?php

namespace Database\Seeders\ProductService;

use App\Models\MediaStorage\MediaStorage;
use App\Models\ProductService\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mediaStorageImages = [
            [
                'id' => '16236c66-d7da-56f9-92df-40dfde284b26',
                'file_name' => 'account-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '26236c66-d7da-56f9-92df-40dfde284b26',
                'file_name' => 'key-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '36236c66-d7da-56f9-92df-40dfde284b26',
                'file_name' => 'currency-bitcoin-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '46236c66-d7da-56f9-92df-40dfde284b26',
                'file_name' => 'forward-item-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
            [
                'id' => '56236c66-d7da-56f9-92df-40dfde284b26',
                'file_name' => 'subscribe-icon.svg',
                'file_type' => 'image/svg',
                'file_size' => 2096,
                'category_id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            ],
        ];

        $categories = [
            [
                'id' => '1f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'slug' => 'account',
                'title' => [
                    'en' => 'Account',
                    'es' => 'Cuenta',
                    'de' => 'Konto',
                    'fr' => 'Compte',
                    'it' => 'Account',
                    'ru' => 'Аккаунт',
                ],
                'image_id' => '16236c66-d7da-56f9-92df-40dfde284b26',
                'is_public' => true,
            ],
            [
                'id' => '2f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'slug' => 'key',
                'title' => [
                    'en' => 'License key',
                    'es' => 'Clave de licencia',
                    'de' => 'Lizenzschlüssel',
                    'fr' => 'Clé de licence',
                    'it' => 'Chiave di licenza',
                    'ru' => 'Лицензионный ключ',
                ],
                'image_id' => '26236c66-d7da-56f9-92df-40dfde284b26',
                'is_public' => true,
            ],
            [
                'id' => '3f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'slug' => 'virtual-currency',
                'title' => [
                    'en' => 'Virtual currency',
                    'es' => 'Moneda virtual',
                    'de' => 'Virtuelle Währung',
                    'fr' => 'Monnaie virtuelle',
                    'it' => 'Valuta virtuale',
                    'ru' => 'Виртуальная валюта',
                ],
                'image_id' => '36236c66-d7da-56f9-92df-40dfde284b26',
                'is_public' => true,
            ],
            [
                'id' => '4f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'slug' => 'service',
                'title' => [
                    'en' => 'Service',
                    'es' => 'Servicio',
                    'de' => 'Dienstleistung',
                    'fr' => 'Service',
                    'it' => 'Servizio',
                    'ru' => 'Услуга',
                ],
                'image_id' => '46236c66-d7da-56f9-92df-40dfde284b26',
                'is_public' => true,
            ],
            [
                'id' => '5f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'slug' => 'subscription',
                'title' => [
                    'en' => 'Subscription',
                    'es' => 'Suscripción',
                    'de' => 'Abonnement',
                    'fr' => 'Abonnement',
                    'it' => 'Abbonamento',
                    'ru' => 'Подписка',
                ],
                'image_id' => '56236c66-d7da-56f9-92df-40dfde284b26',
                'is_public' => true,
            ],
        ];

        MediaStorage::insert($mediaStorageImages);
        foreach ($categories as $category)
        {
            $category['title'] = json_encode($category['title'], JSON_UNESCAPED_UNICODE);
            ProductCategory::insert($category);
        }
    }
}
