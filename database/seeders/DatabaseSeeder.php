<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
   
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'administrador@test.com';
        $user->password = '1234';
        $user->role = 'admin';

        $user->save();

        $user = new User;
        $user->name = 'psicologo';
        $user->email = 'psicologo@gmail.com';
        $user->password = 'psicologo';
        $user->role = 'psicologo';

        $user->save();

        $user = new User;
        $user->name = 'tutor';
        $user->email = 'tutor@gmail.com';
        $user->password = 'tutor';
        $user->role = 'tutor';

        $user->save();

        $user = new User;
        $user->name = 'Paciente';
        $user->email = 'paciente@gmail.com';
        $user->password = 'paciente';
        $user->role = 'paciente';

        $user->save();
        //Datos iniciales de la base de datos

    // $user = new User();
    // $user->name = 'administrador';
    // $user->apellidos = 'apellido';
    // $user->email = 'administrador@gmail.com';
    // $user->role = 'admin';
    // $user->password = bcrypt('administrador');
    // $user->email_verified_at = now();
    // $user->canal_comunicacion = 'correo';
    // $user->contador_bloqueos = 0;
    // $user->bloqueo_permanente = false;
    // $user->fecha_nacimiento = '2023-02-02';
    // $user->ocupacion = 'ingeniero';
    // $user->ci = '219301249asd';
    // $user->codigo_pais_telefono = '+591';
    // $user->telefono = '7347272';
    // $user->pregunta_seguridad_a = 'pregunta a';
    // $user->pregunta_seguridad_b = 'pregunta b';
    // $user->respuesta_seguridad_a = 'respuesta a';
    // $user->respuesta_seguridad_b = 'respuesta b';
    // $user->save();
    //Todos los datos a continuación son de prueba y deben eliminarse antes de pasar a fase de produccion

    //$permission = Permission::create(['name' => 'edit articles']);

    //\App\Models\User::factory(100)->create();

    // $user = new User();
    // $user->name = 'psicologo';
    // $user->apellidos = 'apellido';
    // $user->email = 'psicologo@gmail.com';
    // $user->role = 'psicologo';
    // $user->password = bcrypt('psicologo');
    // $user->email_verified_at = now();
    // $user->canal_comunicacion = 'correo';
    // $user->contador_bloqueos = 0;
    // $user->bloqueo_permanente = false;
    // $user->fecha_nacimiento = '2023-02-02';
    // $user->ocupacion = 'ingeniero';
    // $user->ci = '219301249asd';
    // $user->codigo_pais_telefono = '+591';
    // $user->telefono = '7347272';
    // $user->pregunta_seguridad_a = 'pregunta a';
    // $user->pregunta_seguridad_b = 'pregunta b';
    // $user->respuesta_seguridad_a = 'respuesta a';
    // $user->respuesta_seguridad_b = 'respuesta b';
    // $user->save();

    // $user = new User();
    // $user->name = 'tutor';
    // $user->apellidos = 'apellido';
    // $user->email = 'tutor@gmail.com';
    // $user->role = 'tutor';
    // $user->password = bcrypt('tutor');
    // $user->email_verified_at = now();
    // $user->canal_comunicacion = 'correo';
    // $user->contador_bloqueos = 0;
    // $user->bloqueo_permanente = false;
    // $user->fecha_nacimiento = '2023-02-02';
    // $user->ocupacion = 'ingeniero';
    // $user->ci = '219301249asd';
    // $user->codigo_pais_telefono = '+591';
    // $user->telefono = '7347272';
    // $user->pregunta_seguridad_a = 'pregunta a';
    // $user->pregunta_seguridad_b = 'pregunta b';
    // $user->respuesta_seguridad_a = 'respuesta a';
    // $user->respuesta_seguridad_b = 'respuesta b';
    // $user->save();

    // $user = new User();
    // $user->name = 'tutor2';
    // $user->apellidos = 'apellido2';
    // $user->email = 'tutor2@gmail.com';
    // $user->password = bcrypt('tutor2');
    // $user->email_verified_at = now();
    // $user->canal_comunicacion = 'correo';
    // $user->contador_bloqueos = 0;
    // $user->bloqueo_permanente = false;
    // $user->fecha_nacimiento = '2010-02-02';
    // $user->ocupacion = 'ingeniero';
    // $user->ci = '54321';
    // $user->codigo_pais_telefono = '+591';
    // $user->telefono = '7341342';
    // $user->pregunta_seguridad_a = 'pregunta a';
    // $user->pregunta_seguridad_b = 'pregunta b';
    // $user->respuesta_seguridad_a = 'respuesta a';
    // $user->respuesta_seguridad_b = 'respuesta b';
    // $user->save();

    // $user = new User();
    // $user->name = 'paciente';
    // $user->apellidos = 'apellido';
    // $user->role = 'paciente';
    // $user->email = 'paciente@gmail.com';
    // $user->password = bcrypt('paciente');
    // $user->email_verified_at = now();
    // $user->canal_comunicacion = 'correo';
    // $user->contador_bloqueos = 0;
    // $user->bloqueo_permanente = false;
    // $user->fecha_nacimiento = '2023-02-02';
    // $user->ocupacion = 'ingeniero';
    // $user->ci = '219301249asd';
    // $user->codigo_pais_telefono = '+591';
    // $user->telefono = '7347272';
    // $user->pregunta_seguridad_a = 'pregunta a';
    // $user->pregunta_seguridad_b = 'pregunta b';
    // $user->respuesta_seguridad_a = 'respuesta a';
    // $user->respuesta_seguridad_b = 'respuesta b';
    // $user->save();

    // $user = new User();
    // $user->name = 'sinrol';
    // $user->apellidos = 'apellido';
    // $user->email = 'sinrol@gmail.com';
    // $user->password = bcrypt('sinrol');
    // $user->email_verified_at = now();
    // $user->canal_comunicacion = 'correo';
    // $user->contador_bloqueos = 0;
    // $user->bloqueo_permanente = false;
    // $user->fecha_nacimiento = '2023-02-02';
    // $user->ocupacion = 'ingeniero';
    // $user->ci = '219301249asd';
    // $user->codigo_pais_telefono = '+591';
    // $user->telefono = '7347272';
    // $user->pregunta_seguridad_a = 'pregunta a';
    // $user->pregunta_seguridad_b = 'pregunta b';
    // $user->respuesta_seguridad_a = 'respuesta a';
    // $user->respuesta_seguridad_b = 'respuesta b';
    // $user->save();
    }
}
