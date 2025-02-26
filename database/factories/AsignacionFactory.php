<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Asignacion;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignacion>
 */
class AsignacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alumno_id' => Alumno::inRandomOrder()->value('id') ?? Alumno::factory()->create()->id,
            'curso_id'  => Curso::inRandomOrder()->value('id') ?? Curso::factory()->create()->id,
            'periodo'   => $this->faker->date('Y-m-d'), 
        ];
    }
}
