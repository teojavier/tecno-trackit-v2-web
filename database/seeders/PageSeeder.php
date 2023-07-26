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
    }
}
