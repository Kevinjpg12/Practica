<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Asignacion;
use App\Models\Curso;
use App\Models\Nota;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        Profesor::factory(150)->create();
        Alumno::factory(150)->create();
        Curso::factory(50)->create();
        Asignacion::factory(50)->create();
        Nota::factory(50)->create();
    }
}
