<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Teo Montalvo',
            'email' => 'teito12333@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '78458568',
            'table' => 'users',
            'redirect' => '/users',
        ])->assignRole('administrativo');

        User::create([
            'name' => 'Andres Silva',
            'email' => 'andreshilva3@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '78458485',
            'table' => 'users',
            'redirect' => '/users',
        ])->assignRole('administrativo');

        User::create([
            'name' => 'Edson Sacaca',
            'email' => 'edson3103a@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '78458569',
            'table' => 'users',
            'redirect' => '/users',
        ])->assignRole('cliente');
    }
}
