<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(Messenger_statuSeeder::class);
        $this->call(Messenger_typeSeeder::class);
        $this->call(MessengerSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ArrearStatusSeeder::class);
        $this->call(MoraSeeder::class);
        
    }
}
