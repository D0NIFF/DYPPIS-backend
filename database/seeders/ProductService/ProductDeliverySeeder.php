<?php

namespace Database\Seeders\ProductService;

use App\Models\ProductService\ProductDelivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveries = [
            [
                "id" => "1e615962-37c0-3ab0-dbc8-e06b1681ddb0",
                "title" => [
                    "en" => "Full access",
                    "es" => "Acceso completo",
                    "de" => "Voller Zugang",
                    "fr" => "Accès complet",
                    "it" => "Accesso completo",
                    "ru" => "Полный доступ",
                ],
                "description" => [
                    "en" => "Full access to the account with mail",
                    "es" => "Acceso completo a la cuenta con correo",
                    "de" => "Voller Zugang zum Konto mit E-Mail",
                    "fr" => "Accès complet au compte avec e-mail",
                    "it" => "Accesso completo all\'account con mail",
                    "ru" => "Полный доступ к аккаунту с почтой",
                ],
            ],
            [
                "id" => "2e615962-37c0-3ab0-dbc8-e06b1681ddb0",
                "title" => [
                    "en" => "Partial access",
                    "es" => "Acceso parcial",
                    "de" => "Teilzugang",
                    "fr" => "Accès partiel",
                    "it" => "Accesso parziale",
                    "ru" => "Частичный доступ",
                ],
                "description" => [
                    "en" => "Partial access to the account",
                    "es" => "Acceso parcial a la cuenta",
                    "de" => "Teilzugang zum Konto",
                    "fr" => "Accès partiel au compte",
                    "it" => "Accesso parziale all\'account",
                    "ru" => "Частичный доступ к аккаунту",
                ],
            ],
            [
                "id" => "3e615962-37c0-3ab0-dbc8-e06b1681ddb0",
                "title" => [
                    "en" => "Activation",
                    "es" => "Activación",
                    "de" => "Aktivierung",
                    "fr" => "Activation",
                    "it" => "Attivazione",
                    "ru" => "Активация",
                ],
                "description" => [
                    "en" => "Activation to the account with license key",
                    "es" => "Activación de la cuenta con clave de licencia",
                    "de" => "Aktivierung des Kontos mit Lizenzschlüssel",
                    "fr" => "Activation du compte avec clé de licence",
                    "it" => "Attivazione dell\'account con chiave di licenza",
                    "ru" => "Активация аккаунта с лицензионным ключом",
                ],
            ],
        ];

        $categoriesToDeliveries = [
            [
                'category_id' => '1f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '1e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '1f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '2e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '2f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '3e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '3f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '1e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '3f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '2e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '3f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '3e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '4f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '3e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ],
            [
                'category_id' => '5f7f5d67-3a2f-4e5d-8c95-237cebc91632',
                'delivery_id' => '3e615962-37c0-3ab0-dbc8-e06b1681ddb0',
            ]
        ];

        foreach ($deliveries as $delivery)
        {
            $delivery['title'] = json_encode($delivery['title']);
            $delivery['description'] = json_encode($delivery['description']);
            ProductDelivery::insert($delivery);
        }

        foreach ($categoriesToDeliveries as $value)
        {
            DB::table('product_categories_deliveries')
                ->insert($value);
        }
    }
}
