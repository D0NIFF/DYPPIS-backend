<?php

namespace Database\Seeders\ProductService;

use App\Models\ProductService\ProductResponse;
use Illuminate\Database\Seeder;

class ProductResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productResponses = [
            [
                'id' => '1f7f5u67-3b2f-4f5d-8c95-673cebh91632',
                'response' => 'test'
            ],
            [
                'id' => '2f7f5u67-3b2f-4f5d-8c95-673cebh91632',
                'response' => 'test 2'
            ],
            [
                'id' => '3f7f5u67-3b2f-4f5d-8c95-673cebh91632',
                'response' => 'test 3'
            ],
            [
                'id' => '4f7f5u67-3b2f-4f5d-8c95-673cebh91632',
                'response' => 'test 4'
            ],
            [
                'id' => '5f7f5u67-3b2f-4f5d-8c95-673cebh91632',
                'response' => 'test 5'
            ]
        ];

        foreach ($productResponses as $productResponse) {
            ProductResponse::insert($productResponse);
        }
    }
}
