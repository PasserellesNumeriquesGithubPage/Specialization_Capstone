<?php

namespace Database\Factories;

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
            'full_name'=>$this->faker->name,
            'email'=> $this->faker->safeEmail(),
            'phone_number'=>$this->faker->randomDigit(),
            'address'=>$this->faker->randomLetter,
            'reservation_date_time'=>$this->faker->randomFloat(2,0,10),
            'order_notes' => "example only",
        ];
    }
}
