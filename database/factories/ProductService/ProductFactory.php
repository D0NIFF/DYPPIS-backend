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
            'id' => $this->faker->uuid(),
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'old_price' => $this->faker->numberBetween(8000, 15000),
            'response_id' => $this->faker->randomElement(['c1971fa1-3a87-4645-af60-1a11381e768c', 'c2971fa1-3a87-4645-af60-1a11381e768c', 'c3971fa1-3a87-4645-af60-1a11381e768c', 'c4971fa1-3a87-4645-af60-1a11381e768c', 'c5971fa1-3a87-4645-af60-1a11381e768c']),
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
            'category_id' => $this->faker->randomElement(['1f7f5d67-3a2f-4e5d-8c95-237cebc91632', '2f7f5d67-3a2f-4e5d-8c95-237cebc91632', '3f7f5d67-3a2f-4e5d-8c95-237cebc91632', '4f7f5d67-3a2f-4e5d-8c95-237cebc91632', '5f7f5d67-3a2f-4e5d-8c95-237cebc91632']),
            'delivery_id' => $this->faker->randomElement(['1e615962-37c0-3ab0-dbc8-e06b1681ddb0', '2e615962-37c0-3ab0-dbc8-e06b1681ddb0', '3e615962-37c0-3ab0-dbc8-e06b1681ddb0']),
        ];
    }
}
