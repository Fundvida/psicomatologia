<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: ROLES EN LA BD
        $rol_admin = Role::create(['name' => 'administrador']);
        $rol_tutor = Role::create(['name' => 'tutor']);
        $rol_paciente = Role::create(['name' => 'paciente']);
        $rol_psicologo = Role::create(['name' => 'psicologo']);

        //Permission::create(['name' => 'admin.index']);  TODO: nombre de route
        //Permission::create(['name' => 'admin.index'])->syncRoles([rol1, rol2, ...etc]);  TODO: asignar permisos a rutas
        Permission::create(['name' => 'registrarpsicologo.index'])->syncRoles([$rol_admin]);
        Permission::create(['name' => 'registrarpsicologo.create'])->syncRoles([$rol_admin]);
        Permission::create(['name' => 'registrarpsicologo.update'])->syncRoles([$rol_admin]);
        Permission::create(['name' => 'registrarpsicologo.destroy'])->syncRoles([$rol_admin]);


        Permission::create(['name' => 'registrarpaciente.index'])->syncRoles([$rol_tutor]);
        Permission::create(['name' => 'registrarpaciente.create'])->syncRoles([$rol_tutor]);
        Permission::create(['name' => 'registrarpaciente.update'])->syncRoles([$rol_tutor]);
        Permission::create(['name' => 'registrarpaciente.destroy'])->syncRoles([$rol_tutor]);
    }
}
