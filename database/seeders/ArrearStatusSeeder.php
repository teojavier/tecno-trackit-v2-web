<?php

namespace Database\Seeders;

use App\Models\ArrearStatu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArrearStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArrearStatu::create([
            'name' => 'sin mora'
        ]);

        ArrearStatu::create([
            'name' => 'moroso'
        ]);
    }
}
