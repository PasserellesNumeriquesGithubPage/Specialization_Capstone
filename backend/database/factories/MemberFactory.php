<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        'fullName'=> $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //the long token means "password"
        'completeaddress' =>$this->faker->address,
        'contactnumber' =>$this->faker->phoneNumber,
        'membership'=>$this->faker->randomElement(['Normal' , 'Regular', 'VIP']),
        ];
    }
}
