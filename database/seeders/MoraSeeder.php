<?php

namespace Database\Seeders;

use App\Models\Mora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mora::create([
            'arrear_statu_id' => 1,
            'messenger_id' => 1,
            'table' => 'moras',
            'redirect' => '/moras',
        ]);

        Mora::create([
            'arrear_statu_id' => 1,
            'messenger_id' => 2,
            'table' => 'moras',
            'redirect' => '/moras',
        ]);

        Mora::create([
            'arrear_statu_id' => 1,
            'messenger_id' => 3,
            'table' => 'moras',
            'redirect' => '/moras',            
        ]);
    }
}
