<?php

namespace Database\Seeders;

use App\Models\Messenger_statu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Messenger_statuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Messenger_statu::create([
            'name' => 'Solicitado',
        ]);

        Messenger_statu::create([
            'name' => 'Atendiendo',
        ]);

        Messenger_statu::create([
            'name' => 'Finalizado',
        ]);
    }
}
