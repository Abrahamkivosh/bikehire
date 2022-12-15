<?php

namespace Database\Factories;

use App\Models\Bike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fn()=> User::all()->random()->id,
            'book_number' => $this->faker->randomNumber(8),
            'bike_id' => fn()=> Bike::all()->random()->id,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price_per_hour' => $this->faker->randomFloat(2, 0, 100),
            'total_hours' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 0, 100),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'canceled','completed']),
            
            
        ];
    }
}
