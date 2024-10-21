<?php

namespace Database\Seeders;

use App\Models\MediaStorage;
use App\Models\ProductService\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private static $mediaStorageCategories = [
        [
            'id' => '06295c29-d7da-41e7-97df-40ffde284a93',
            'title' => 'Avatar',
            'path' => '/storage/uploads/images/avatars'
        ],
        [
            'id' => '16295c29-d7da-41e7-97df-40ffde284a93',
            'title' => 'Banner',
            'path' => '/storage/uploads/images/banners'
        ],
        [
            'id' => '26295c29-d7da-41e7-97df-40ffde284a93',
            'title' => 'Flag',
            'path' => '/storage/uploads/images/flags'
        ],
        [
            'id' => '36295c29-d7da-41e7-97df-40ffde284a93',
            'title' => 'Icon',
            'path' => '/storage/uploads/images/icons'
        ],
        [
            'id' => '46295c29-d7da-41e7-97df-40ffde284a93',
            'title' => 'Product background',
            'path' => '/storage/uploads/images/products'
        ],
    ];
//    private static $mediaStorageImages = [
//        [
//            'id' => '16236c29-d7da-41e9-97df-40ffde284a93',
//            'file_name' => 'games-icon.svg',
//            'file_type' => 'image/svg',
//            'file_size' => 2096,
//            'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
//            'created_at' => now(),
//        ],
//        [
//            'id' => '26236c29-d7da-41e9-97df-40ffde284a93',
//            'file_name' => 'software-icon.svg',
//            'file_type' => 'image/svg',
//            'file_size' => 2096,
//            'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
//            'created_at' => now(),
//        ],
//        [
//            'id' => '36236c29-d7da-41e9-97df-40ffde284a93',
//            'file_name' => 'social-apps-icon.svg',
//            'file_type' => 'image/svg',
//            'file_size' => 2096,
//            'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
//            'created_at' => now(),
//        ],
//        [
//            'id' => '46236c29-d7da-41e9-97df-40ffde284a93',
//            'file_name' => 'mobile-games-icon.svg',
//            'file_type' => 'image/svg',
//            'file_size' => 2096,
//            'category_id' => '36295c29-d7da-41e7-97df-40ffde284a93',
//            'created_at' => now(),
//        ],
//    ];
    private static $currencies = [
        [
            'code' => 'USD',
            'title' => 'US Dollar',
            'symbol' => '$',
            //'course' => 1,
        ],
        [
            'code' => 'EUR',
            'title' => 'EURO',
            'symbol' => '€',
            //'course' => 0.8962,
        ],
        [
            'code' => 'RUB',
            'title' => 'Russian Ruble',
            'symbol' => '₽',
            //'course' => 92.7126,
        ]
    ];
    private static $platformTypes = [
        [
            'slug' => 'games',
            'title' => [
                'en' => 'Games',
                'fr' => 'Jeux',
                'es' => 'Juegos',
                'de' => 'Spiele',
                'ru' => 'Игры'
            ],
            'image_id' => '16236c29-d7da-41e9-97df-40ffde284a93',
        ],
        [
            'slug' => 'software',
            'title' => [
                'en' => 'Software',
                'fr' => 'Logiciel',
                'es' => 'Software',
                'de' => 'Software',
                'ru' => 'Программное обеспечение'
            ],
            'image_id' => '26236c29-d7da-41e9-97df-40ffde284a93',
        ],
        [
            'slug' => 'socials-apps',
            'title' => [
                'en' => 'Social networks & apps',
                'fr' => 'Réseaux sociaux et apps',
                'es' => 'Redes sociales y aplicaciones',
                'de' => 'Soziale Netzwerke und Apps',
                'ru' => 'Соцсети и сервисы'
            ],
            'image_id' => '36236c29-d7da-41e9-97df-40ffde284a93',
        ],
        [
            'slug' => 'mobile-games',
            'title' => [
                'en' => 'Mobile games',
                'fr' => 'Jeux mobiles',
                'es' => 'Juegos para móviles',
                'de' => 'Mobile Spiele',
                'ru' => 'Мобильные игры'
            ],
            'image_id' => '46236c29-d7da-41e9-97df-40ffde284a93',
        ],
    ];
    private static $productPlatforms = [
        [
            'id' => '1aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
            'slug' => 'clash_of_clans',
            'title' => 'Clash of Clans',
        ],
        [
            'id' => '2aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
            'slug' => 'clash_royale',
            'title' => 'Clash Royale',
        ],
        [
            'id' => '3aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
            'slug' => 'steam',
            'title' => 'Steam',
        ],
        [
            'id' => '4aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
            'slug' => 'epic_games',
            'title' => 'Epic games',
        ],
        [
            'id' => '5aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
            'slug' => 'adobe_photoshop',
            'title' => 'Adobe Photoshop',
        ],
        [
            'id' => '6aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
            'slug' => 'figma',
            'title' => 'Figma',
        ],
    ];
    private static $productCategories = [
        [
            'id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'slug' => 'account',
            'title' => [
                'en' => 'Account',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Konto',
                'ru' => 'Аккаунт'
            ],
            'is_public' => 1
        ],
        [
            'id' => 'e653784b-138e-4e30-a99c-4186d9e2cd53',
            'slug' => 'license_key',
            'title' => [
                'en' => 'License Key',
                'fr' => 'Clé de licence',
                'es' => 'Clave de licencia',
                'de' => 'Lizenzschlüssel',
                'ru' => 'Лицензионный ключ'
            ],
            'is_public' => 1
        ],
        [
            'id' => 'e653784b-138e-4e25-a99c-4186d9e2cd53',
            'slug' => 'gift',
            'title' => [
                'en' => 'Gift',
                'fr' => 'Cadeau',
                'es' => 'Regalo',
                'de' => 'Geschenk',
                'ru' => 'Подарок'
            ],
            'is_public' => 1
        ],
        [
            'id' => 'e653784b-138e-4e30-a85c-4186d9e2cd53',
            'slug' => 'service',
            'title' => [
                'en' => 'Service',
                'fr' => 'Service',
                'es' => 'Servicio',
                'de' => 'Dienst',
                'ru' => 'Услуга'
            ],
            'is_public' => 1
        ],
        [
            'id' => 'e653784b-036e-4e30-a99c-4186d9e2cd53',
            'slug' => 'boost',
            'title' => [
                'en' => 'Boost',
                'fr' => 'Boost',
                'es' => 'Aumentar',
                'de' => 'Boost',
                'ru' => 'Буст'
            ],
            'is_public' => 1
        ],
    ];
    private static $productFilters = [
        [
            'id' => '15a8f198-8c84-4c78-9cd9-93cde5c6e773',
            'category_id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'filters' => [
                'cups' => 'int',
                'townhall' => 'array',
                'village_th' => 'array',
                'gems' => 'int',
                'change_nick' => 'bool'
            ]
        ],
        [
            'id' => '30ec7dca-ecaa-4d83-a8f3-20cb69d0fbd3',
            'category_id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'filters' => [
                'cups' => 'int',
                'gems' => 'int',
                'change_nick' => 'bool'
            ]
        ],
        [
            'id' => '045aa84f-3568-48a7-82a8-ee8172b7a795',
            'category_id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'filters' => [
                'cups' => 'int',
                'gems' => 'int',
                'change_nick' => 'bool'
            ]
        ],
    ];
    private static $productDeliveries = [
        [
            'id' => '6a6003d2-cc8d-4448-864a-853168e415b8',
            'title' => [
                'en' => 'Full access',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Vollständiger Zugang',
                'ru' => 'Аккаунт'
            ],
            'description' => [
                'en' => 'Full access to the account',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Konto',
                'ru' => 'Аккаунт'
            ],
        ],
        [
            'id' => '6a6253d2-cc8d-4448-864a-853168e415b8',
            'title' => [
                'en' => 'Partial access',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Konto',
                'ru' => 'Аккаунт'
            ],
            'description' => [
                'en' => 'Partial access to the account',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Konto',
                'ru' => 'Аккаунт'
            ],
        ],
        [
            'id' => '6a6003d2-cc8d-2469-864a-853168e415b8',
            'title' => [
                'en' => 'Re-binding',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Konto',
                'ru' => 'Аккаунт'
            ],
            'description' => [
                'en' => 'Re-binding the account to you',
                'fr' => 'Compte',
                'es' => 'Cuenta',
                'de' => 'Konto',
                'ru' => 'Аккаунт'
            ],
        ],
    ];
    private static $productDeliveriesCategories = [
        [
            'category_id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'delivery_id' => '6a6003d2-cc8d-4448-864a-853168e415b8',
        ],
        [
            'category_id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'delivery_id' => '6a6253d2-cc8d-4448-864a-853168e415b8',

        ],
        [
            'category_id' => '44095951-08b0-4c28-bcd5-3c33e76dc847',
            'delivery_id' => '6a6003d2-cc8d-2469-864a-853168e415b8',
        ],
        [
            'category_id' => 'e653784b-036e-4e30-a99c-4186d9e2cd53',
            'delivery_id' => '6a6003d2-cc8d-2469-864a-853168e415b8',
        ]
    ];
    private static $productResponses = [
        [
            'id' => '1f32911e-8541-4d80-a441-86bf6b200964',
            'response' => 'test 1'
        ],
        [
            'id' => '2f32911e-8541-4d80-a441-86bf6b200964',
            'response' => 'test 2'
        ],
        [
            'id' => '3f32911e-8541-4d80-a441-86bf6b200964',
            'response' => 'test 3'
        ],
        [
            'id' => '4f32911e-8541-4d80-a441-86bf6b200964',
            'response' => 'test 4'
        ],
        [
            'id' => '5f32911e-8541-4d80-a441-86bf6b200964',
            'response' => 'test 5'
        ],
    ];

    /**
     *  @return void
     */
    private static function fillUserRoles() : void
    {
        $titles = ['Moderator', 'Administrator', 'ROOT'];
        for ($i = 1; $i <= 3; $i++) {
            DB::table('user_roles')->insert([
                'id' => $i,
                'title' => $titles[($i - 1)]
            ]);
        }
    }

    /**
     *  Fill db tables
     *
     *  @return void
     */
    private static function runLocals() : void
    {
        foreach (self::$mediaStorageCategories as $value)
        {
            DB::table('media_storage_categories')
                ->insert($value);
        }
        foreach (self::$currencies as $value)
        {
            $value['id'] = fake()->uuid();
            DB::table('currencies')
                ->insert($value);
        }
        foreach (self::$platformTypes as $value)
        {
            $value['id'] = fake()->uuid();
            $value['title'] = json_encode($value['title']);
            DB::table('platform_types')
                ->insert($value);
        }
        foreach (self::$productPlatforms as $value)
        {
            $type = DB::table('platform_types')->where('slug', 'mobile-games')->first();
            $value['type_id'] = $type->id;
            DB::table('platforms')
                ->insert($value);
        }
        foreach (self::$productCategories as $value)
        {
            $value['title'] = json_encode($value['title']);
            DB::table('product_categories')
                ->insert($value);
        }
        foreach (self::$productDeliveries as $value)
        {
            $value['title'] = json_encode($value['title']);
            $value['description'] = json_encode($value['description']);
            DB::table('product_deliveries')
                ->insert($value);
        }
        foreach (self::$productDeliveriesCategories as $value)
        {
            DB::table('product_categories_deliveries')
                ->insert($value);
        }
        foreach (self::$productResponses as $value)
        {
            DB::table('product_responses')
                ->insert($value);
        }
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        self::fillUserRoles();
//        User::factory(100)->create();
//
//        self::runLocals();
//
//        Product::factory(50)->create();

    }
}
