<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'    => $this->faker->name(),
            'apellidos' => $this->faker->lastname(),
            'telefono'  => $this->faker->e164PhoneNumber(),
            'email'     => $this->faker->unique()->email(),
        ];
    }
}
