<?php

namespace Database\Seeders;

use App\Models\Messenger_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Messenger_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Messenger_type::create([
            'name' => 'Solicitudes',
        ]);

        Messenger_type::create([
            'name' => 'Recomendaciones',
        ]);

        Messenger_type::create([
            'name' => 'Reclamos',
        ]);
    }
}
