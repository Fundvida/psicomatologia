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
        User::create([
            'name' => 'Admin',
            'email' => 'administrador@gmail.com',
            'password' => 'admin',
            'role' => 'admin', 
        ])->assignRole('administrador');

        User::factory()->create();

        User::create([
            'name' => 'Tutor',
            'email' => 'tutor@gmail.com',
            'password' => 'tutor',
            'role' => 'tutor', 
        ])->assignRole('tutor');

        User::factory()->create();
        

        // $user = new User;
        // $user->name = 'tutor';
        // $user->email = 'tutor@gmail.com';
        // $user->password = 'tutor';
        // $user->role = 'tutor';
        // $user->save();

    }
}
