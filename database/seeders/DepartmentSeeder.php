<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Sistemas',
            'table' => 'departments',
            'redirect' => '/departments',
        ]);

        Department::create([
            'name' => 'Recursos Humanos',
            'table' => 'departments',
            'redirect' => '/departments',
        ]);

        Department::create([
            'name' => 'Marketing',
            'table' => 'departments',
            'redirect' => '/departments',
        ]);

        Department::create([
            'name' => 'Contabilidad',
            'table' => 'departments',
            'redirect' => '/departments',
        ]);

        Department::create([
            'name' => 'Cobranzas',
            'table' => 'departments',
            'redirect' => '/departments',
        ]);
    }
}
