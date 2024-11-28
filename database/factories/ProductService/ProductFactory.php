<?php

namespace Database\Factories\ProductService;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'old_price' => $this->faker->numberBetween(8000, 15000),
            'response_id' => $this->faker->randomElement(['1f7f5u67-3b2f-4f5d-8c95-673cebh91632', '2f7f5u67-3b2f-4f5d-8c95-673cebh91632', '3f7f5u67-3b2f-4f5d-8c95-673cebh91632', '4f7f5u67-3b2f-4f5d-8c95-673cebh91632', '5f7f5u67-3b2f-4f5d-8c95-673cebh91632']),
            'platform_id' => $this->faker->randomElement([
                '1a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '2a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '3a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '4a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '5a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '6a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '7a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
                '8a8532ec-734a-4cab-bb52-9bc8bb2b4af8',
            ]),
            'category_id' => $this->faker->randomElement(['16236c66-d7da-56f9-92df-40dfde284b26', '26236c66-d7da-56f9-92df-40dfde284b26', '36236c66-d7da-56f9-92df-40dfde284b26', '46236c66-d7da-56f9-92df-40dfde284b26', '56236c66-d7da-56f9-92df-40dfde284b26']),
            'delivery_id' => $this->faker->randomElement(['1e615962-37c0-3ab0-dbc8-e06b1681ddb0', '2e615962-37c0-3ab0-dbc8-e06b1681ddb0', '3e615962-37c0-3ab0-dbc8-e06b1681ddb0']),
        ];
    }
}
