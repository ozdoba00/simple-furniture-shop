<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Offer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'code' => fake()->unique()->uuid(),
            'price' => fake()->numberBetween(1, 5000),
            'promo_price' => fake()->numberBetween(1, 4000),
            'promotion' => fake()->numberBetween(0, 1),
            'availability' => fake()->numberBetween(0, 1),
            'amount' => fake()->numberBetween(0, 200),
        ];
    }
}
