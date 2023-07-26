<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'view' => 'users.index',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'users.edit',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'users.create',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'category.index',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'category.edit',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'category.create',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'departments.index',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'departments.edit',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'departments.create',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'messengers.solicitudes',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'messengers.recomendaciones',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'messengers.reclamos',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'messengers.solicitudes.solicitar',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'messengers.solicitudes.show',
            'count' => 0,
        ]);

        Page::create([
            'view' => 'messengers.recomendaciones.recomendar',
            'count' => 0,
        ]);
        
        Page::create([
            'view' => 'messengers.reclamos.reclamar',
            'count' => 0,
        ]);
    }
}
