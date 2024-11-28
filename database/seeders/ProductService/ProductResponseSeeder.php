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
                'id' => 'c1971fa1-3a87-4645-af60-1a11381e768c',
                'response' => 'test'
            ],
            [
                'id' => 'c2971fa1-3a87-4645-af60-1a11381e768c',
                'response' => 'test 2'
            ],
            [
                'id' => 'c3971fa1-3a87-4645-af60-1a11381e768c',
                'response' => 'test 3'
            ],
            [
                'id' => 'c4971fa1-3a87-4645-af60-1a11381e768c',
                'response' => 'test 4'
            ],
            [
                'id' => 'c5971fa1-3a87-4645-af60-1a11381e768c',
                'response' => 'test 5'
            ]
        ];

        foreach ($productResponses as $productResponse) {
            ProductResponse::insert($productResponse);
        }
    }
}
