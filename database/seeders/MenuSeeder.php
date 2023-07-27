<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuReference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Menu::create([
            'title' => 'Gestionar Usuario',
            'redirect' => '#'
        ]);
        // 2
        Menu::create([
            'title' => 'Gestionar Departamentos',
            'redirect' => '#'
        ]);
        // 3
        Menu::create([
            'title' => 'Gestionar Categorias',
            'redirect' => '#'
        ]);
        // 4
        Menu::create([
            'title' => 'Gestionar Mora',
            'redirect' => '#'
        ]);
        // 5
        Menu::create([
            'title' => 'Gestionar Articulos',
            'redirect' => '#'
        ]);
        // 6
        Menu::create([
            'title' => 'Gestionar Mensajeria',
            'redirect' => '#'
        ]);
        // 7
        Menu::create([
            'title' => 'Gestionar SoporteIA',
            'redirect' => '#'
        ]);
        // 8
        Menu::create([
            'title' => 'Gestionar Reportes',
            'redirect' => '#'
        ]);
        // 9
        Menu::create([
            'title' => 'Listar Usuario',
            'redirect' => 'users.index'
        ]);
        // 10
        Menu::create([
            'title' => 'Crear Usuarios',
            'redirect' => 'users.create'
        ]);
        // 11
        Menu::create([
            'title' => 'Lista de Departamentos',
            'redirect' => 'departments.index'
        ]);
        // 12
        Menu::create([
            'title' => 'Lista de Categorias',
            'redirect' => 'categories.index'
        ]);
        // 13
        Menu::create([
            'title' => 'Lista de Moras',
            'redirect' => 'moras.index'
        ]);
        // 14
        Menu::create([
            'title' => 'Lista de Articulos',
            'redirect' => 'articles.index'
        ]);
        // 15
        Menu::create([
            'title' => 'Crear Articulos',
            'redirect' => 'articles.create'
        ]);
        // 16
        Menu::create([
            'title' => 'Solicitudes',
            'redirect' => 'messengers.solicitudes'
        ]);
        // 17
        Menu::create([
            'title' => 'Recomendaciones',
            'redirect' => 'messengers.recomendaciones'
        ]);
        // 18
        Menu::create([
            'title' => 'Reclamos',
            'redirect' => 'messengers.reclamos'
        ]);
        // 19
        Menu::create([
            'title' => 'Lista de Soporte IA',
            'redirect' => 'messengers.reclamos'
        ]);
        // 20
        Menu::create([
            'title' => 'Lista de Reportes',
            'redirect' => 'messengers.reclamos'
        ]);

        MenuReference::create([
            'menu_id' => 1,
            'submenu_id' => 9
        ]);

        MenuReference::create([
            'menu_id' => 1,
            'submenu_id' => 10
        ]);


        MenuReference::create([
            'menu_id' => 2,
            'submenu_id' => 11
        ]);

        MenuReference::create([
            'menu_id' => 3,
            'submenu_id' => 12
        ]);

        MenuReference::create([
            'menu_id' => 4,
            'submenu_id' => 13
        ]);

        MenuReference::create([
            'menu_id' => 5,
            'submenu_id' => 14
        ]);

        MenuReference::create([
            'menu_id' => 5,
            'submenu_id' => 15
        ]);

        MenuReference::create([
            'menu_id' => 6,
            'submenu_id' => 16
        ]);

        MenuReference::create([
            'menu_id' => 6,
            'submenu_id' => 17
        ]);

        MenuReference::create([
            'menu_id' => 6,
            'submenu_id' => 18
        ]);

        MenuReference::create([
            'menu_id' => 7,
            'submenu_id' => 19
        ]);

        MenuReference::create([
            'menu_id' => 8,
            'submenu_id' => 20
        ]);

    }
}
