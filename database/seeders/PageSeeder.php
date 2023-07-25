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
    }
}
