<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Admin',
        //     'apellidos' => 'Apellido del administrador', 
        //     'canal_comunicacion' => 'correo',
        //     'email' => 'administrador@gmail.com',
        //     'password' => 'admin',
        //     'ci' => '219301249asd',
        //     'fecha_nacimiento' => '2023-02-02',
        //     'role' => 'admin',
        //     'codigo_pais_telefono' => '+591',
        //     'telefono' => '7347272',
        //     'pregunta_seguridad_a' => 'pregunta a',
        //     'pregunta_seguridad_b' => 'pregunta b',
        //     'respuesta_seguridad_a' => 'respuesta a',
        //     'respuesta_seguridad_b' => 'respuesta b',
        // ])->assignRole('administrador');
        

        // User::factory()->create();

        // User::create([
        //     'name' => 'Tutor',
        //     'apellidos' => 'Apellido del tutor', 
        //     'canal_comunicacion' => 'correo',
        //     'email' => 'tutor@gmail.com',
        //     'password' => 'tutor',
        //     'ci' => '219301249asd',
        //     'fecha_nacimiento' => '2023-02-02',
        //     'role' => 'tutor', 
        //     'codigo_pais_telefono' => '+591',
        //     'telefono' => '7347272',
        //     'pregunta_seguridad_a' => 'pregunta a',
        //     'pregunta_seguridad_b' => 'pregunta b',
        //     'respuesta_seguridad_a' => 'respuesta a',
        //     'respuesta_seguridad_b' => 'respuesta b',
        //         ])->assignRole('tutor');

        // User::factory()->create();
        

        User::create([
            'name' => 'tutor',
            'email' => 'tutor@gmail.com',
            'password' => 'tutor',
            'role' => 'tutor',
        ])->assignRole('tutor');
        User::factory()->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin',
        ])->assignRole('administrador');
        User::factory()->create();
        

    }
}
