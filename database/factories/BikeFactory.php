<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'brand_id' => fn()=> Brand::all()->random()->id,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'price_per_hour' => $this->faker->randomFloat(2, 0, 100),
            'color' => $this->faker->colorName,
            'quantity' => $this->faker->numberBetween(0, 100),
            
        ];
    }
}
