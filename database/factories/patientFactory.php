<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\patient>
 */
class patientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstname(),
            'lastname' => fake()->lastname(),
            'midlename' => fake()->randomLetter(),
            'age' => '20',
            'birthday' => fake()->date(),
            'civilstatus' => 'single',
            'contact' =>'1234568',
            'address' => fake()->address(),
        ];
    }
}
