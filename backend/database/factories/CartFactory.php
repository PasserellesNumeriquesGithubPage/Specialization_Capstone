<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id'=>$this->faker->randomDigit(),
            'coffee'=> $this->faker->randomElement(['Top Coffee','Greatest White','Kopiko', 'Top 45', 'Nescafe','Barako']),
            'price'=>$this->faker->randomFloat(2,99,120),
            'qty'=>$this->faker->randomFloat(2,50,100),
            'total'=>$this->faker->randomFloat(2,0,10),
        ];
    }
}
