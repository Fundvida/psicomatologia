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
        // Crear roles si no existen
        $roles = [
            'Psicologo',
            'Paciente',
            'Tutor',
            'Administrador',
        ];

        foreach ($roles as $role) {
            if (!Role::where('name', $role)->exists()) {
                Role::create(['name' => $role]);
            }
        }

        // Obtener los roles creados
        $role_1 = Role::where('name', 'Psicologo')->first();
        $role_2 = Role::where('name', 'Paciente')->first();
        $role_3 = Role::where('name', 'Tutor')->first();
        $role_4 = Role::where('name', 'Administrador')->first();

        // Crear permisos y asignarlos
        $permissions = [
            'listadoAllSesiones' => [$role_4],
            'listaPaciente' => [$role_4],
            'listaPsicologo' => [$role_4],
            'psicologo.store' => [$role_4],
            'psicologo.edit' => [$role_4],
            'psicologo.del' => [$role_4],
            'paciente.listar' => [$role_4],
            'homePsicologoHorario' => [$role_1],
            'psicologo.editHorario_x_dia' => [$role_1],
            'psicologo.inhabilitarHorario' => [$role_1],
            'psicologo.addHorario' => [$role_1],
            'psicologo.notificaciones' => [$role_1],
            'homePacienteSesiones' => [$role_2],
            'paciente.files' => [$role_2],
            'cambiarContraseña' => [$role_1, $role_2, $role_3, $role_4],
            'paciente.store' => [$role_1, $role_4],
            'paciente.edit' => [$role_1, $role_4],
            'paciente.del' => [$role_1, $role_4],
            'paciente.listar' => [$role_1, $role_4],
            'paciente.delSesion' => [$role_1, $role_2],
        ];

        foreach ($permissions as $permission => $roles) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $perm->syncRoles($roles);
        }
    }
}
