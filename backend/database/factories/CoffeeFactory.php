<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Coffee;

class CoffeeFactory extends Factory
{

    protected $model = Coffee::class;
    /**
     * Define the model's default state.
     *
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coffee'=> $this->faker->randomElement(['Top Coffee','Greatest White','Kopiko', 'Top 45', 'Nescafe','Barako']),
            'description'=> $this->faker->text,
            'normal_price'=>$this->faker->randomFloat(2,99,120),
            'regular_price'=>$this->faker->randomFloat(2,50,100),
            'vip_price'=>$this->faker->randomFloat(2,0,10),
        ];
    }
}
