<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'book_id' => fn()=> Book::all()->random()->id,
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement(['pending', 'success', 'failed']),
            'payment_method' => $this->faker->randomElement(['cash','paypal', 'Mpesa']),
        ];
    }
}
