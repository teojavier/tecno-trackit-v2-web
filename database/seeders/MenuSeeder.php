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
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 2
        Menu::create([
            'title' => 'Gestionar Departamentos',
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 3
        Menu::create([
            'title' => 'Gestionar Categorias',
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 4
        Menu::create([
            'title' => 'Gestionar Mora',
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 5
        Menu::create([
            'title' => 'Gestionar Articulos',
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 6
        Menu::create([
            'title' => 'Gestionar Mensajeria',
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 7
        Menu::create([
            'title' => 'Gestionar SoporteIA',
            'redirect' => '#',
            'rolname' => 'administrativo'
        ]);
        // 8
        Menu::create([
            'title' => 'Gestionar Reportes',
            'redirect' => '#',
            'rolname' => 'administrativo'
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
            'title' => 'Chat Soporte IA',
            'redirect' => 'soporte-ia.index'
        ]);
        // 20
        Menu::create([
            'title' => 'Lista de Reportes',
            'redirect' => 'messengers.reclamos'
        ]);
        // 21
        Menu::create([
            'title' => 'Soporte IA',
            'redirect' => '#',
            'rolname' => 'cliente'
        ]);
        // 22
        Menu::create([
            'title' => 'Mi Mensajeria',
            'redirect' => '#',
            'rolname' => 'cliente'
        ]);
        // 23
        Menu::create([
            'title' => 'Mis Solicitudes',
            'redirect' => 'messengers.clientes.solicitudes'
        ]);
        // 24
        Menu::create([
            'title' => 'Mis Recomendaciones',
            'redirect' => 'messengers.clientes.recomendaciones'
        ]);
        // 25
        Menu::create([
            'title' => 'Mis Reclamos',
            'redirect' => 'messengers.clientes.reclamos'
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

        MenuReference::create([
            'menu_id' => 21,
            'submenu_id' => 19
        ]);

        MenuReference::create([
            'menu_id' => 22,
            'submenu_id' => 23
        ]);

        MenuReference::create([
            'menu_id' => 22,
            'submenu_id' => 24
        ]);

        MenuReference::create([
            'menu_id' => 22,
            'submenu_id' => 25
        ]);
    }
}
