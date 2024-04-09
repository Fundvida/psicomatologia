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
        
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);

        // $user = new User;
        // $user->name = 'Admin';
        // $user->email = 'administrador@test.com';
        // $user->password = '1234';
        // $user->role = 'admin';

        // $user->save();

        // $user = new User;
        // $user->name = 'psicologo';
        // $user->email = 'psicologo@gmail.com';
        // $user->password = 'psicologo';
        // $user->role = 'psicologo';

        // $user->save();

        // $user = new User;
        // $user->name = 'tutor';
        // $user->email = 'tutor@gmail.com';
        // $user->password = 'tutor';
        // $user->role = 'tutor';

        // $user->save();

        // $user = new User;
        // $user->name = 'Paciente';
        // $user->email = 'paciente@gmail.com';
        // $user->password = 'paciente';
        // $user->role = 'paciente';

        // $user->save();
        
    }
}
