<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1 = Role::create(['name' => 'administrativo']);
        $rol2 = Role::create(['name' => 'cliente']);

        // administrativos
        Permission::create(['name' => 'administracion'])->syncRoles([$rol1]);
    
        // clientes
        Permission::create(['name' => 'busquedas'])->syncRoles([$rol2]);

    }
}
