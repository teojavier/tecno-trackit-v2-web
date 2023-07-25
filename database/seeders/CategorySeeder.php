<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Problemas del movil',
            'time' => 5,
            'table' => 'categories',
            'redirect' => '/categories',
        ]);

        Category::create([
            'name' => 'TR4',
            'time' => 4,
            'table' => 'categories',
            'redirect' => '/categories',
        ]);

        Category::create([
            'name' => 'CGP',
            'time' => 10,
            'table' => 'categories',
            'redirect' => '/categories',
        ]);

        Category::create([
            'name' => 'Servicio Tecnico',
            'time' => 1,
            'table' => 'categories',
            'redirect' => '/categories',
        ]);

        Category::create([
            'name' => 'Redes',
            'time' => 1,
            'table' => 'categories',
            'redirect' => '/categories',
        ]);
    }
}
