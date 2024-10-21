<?php

namespace Database\Factories\ProductService;

use App\Models\ProductService\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat($min = 100, $max = 1000),
            'old_price' => $this->faker->randomElement([null, 1999, 2899, 5999, 10999, 2666]),
            'filters' => json_encode([
                'rang' => 'Global',
                'region' => 'USA',
                'wins' => 159,
                'battle_pass' => true
            ]),
            'response_id' => $this->faker->randomElement(['1f32911e-8541-4d80-a441-86bf6b200964', '2f32911e-8541-4d80-a441-86bf6b200964',
                '3f32911e-8541-4d80-a441-86bf6b200964', '4f32911e-8541-4d80-a441-86bf6b200964', '5f32911e-8541-4d80-a441-86bf6b200964']),
            'platform_id' => $this->faker->randomElement(['1aadf6d8-fed8-4896-b4f3-11b9ac98fad9', '2aadf6d8-fed8-4896-b4f3-11b9ac98fad9',
                '3aadf6d8-fed8-4896-b4f3-11b9ac98fad9', '4aadf6d8-fed8-4896-b4f3-11b9ac98fad9', '5aadf6d8-fed8-4896-b4f3-11b9ac98fad9', '6aadf6d8-fed8-4896-b4f3-11b9ac98fad9']),
            'category_id' => $this->faker->randomElement(['44095951-08b0-4c28-bcd5-3c33e76dc847', 'e653784b-138e-4e30-a99c-4186d9e2cd53',
                'e653784b-138e-4e25-a99c-4186d9e2cd53', 'e653784b-138e-4e30-a85c-4186d9e2cd53', 'e653784b-036e-4e30-a99c-4186d9e2cd53']),
            'delivery_id' => $this->faker->randomElement(['6a6003d2-cc8d-4448-864a-853168e415b8', '6a6253d2-cc8d-4448-864a-853168e415b8', '6a6003d2-cc8d-2469-864a-853168e415b8']),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
