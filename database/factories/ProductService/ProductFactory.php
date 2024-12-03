<?php

namespace Database\Factories\ProductService;

use App\Models\ProductService\Platform;
use App\Models\ProductService\ProductCategory;
use App\Models\ProductService\ProductDelivery;
use App\Models\ProductService\ProductResponse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
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
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'response_id' => $this->faker->randomElement(ProductResponse::all()->pluck('id')->toArray()),
            'platform_id' => $this->faker->randomElement(Platform::all()->pluck('id')->toArray()),
            'category_id' => $this->faker->randomElement(ProductCategory::all()->pluck('id')->toArray()),
            'delivery_id' => $this->faker->randomElement(ProductDelivery::all()->pluck('id')->toArray()),
        ];
    }
}
