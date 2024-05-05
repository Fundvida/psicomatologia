<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roles_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Psicologo']);
        Role::create(['name' => 'Paciente']);
        Role::create(['name' => 'Tutor']);
        Role::create(['name' => 'Administrador']);
    }
}
