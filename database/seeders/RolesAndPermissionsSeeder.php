<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $permissions = [
            'create_socio',
            'edit_socio',
            'delete_socio',
            'view_socio',
            'manage_arms',
            'manage_vehicles',
            'access_reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles
        $roles = [
            'Administrador' => ['create_socio', 'edit_socio', 'delete_socio', 'view_socio', 'access_reports'],
            'Supervisor'    => ['edit_socio', 'view_socio', 'access_reports'],
            'Socio'         => ['view_socio'],
        ];

        foreach ($roles as $role => $rolePermissions) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);
            $roleInstance->syncPermissions($rolePermissions);
        }
    }
}
