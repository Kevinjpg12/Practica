<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hor = $this->faker->randomElement([
            '09-10',
            '10-11',
            '11-12',
            '12-01',
        ]);
        $cur = $this->faker->randomElement([
            'MATEMATICA', 
            'COMUNICACIONES', 
            'QUIMICA', 
            'EPT', 
            'ARTE',
            'EDUCACION FISICA',
            'COMPUTACION'
        ]);
        $pid = Profesor::inRandomOrder()->first();        
        return [
            'descripcion'   => "$cur ({$hor})",
            'horario'       => $hor,
            'profesor_id'   => $pid->id,
        ];
    }
}
