<?php

namespace Database\Seeders;

use App\Models\Messenger;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Messenger::create([
            'description' => 'Tengo Problemas con el TR4',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 2,
            'messenger_type_id' => 1,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/solicitudes',
        ]);

        Messenger::create([
            'description' => 'Mi chip no responde',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 2,
            'client_id' => 3,

            'categorie_id' => 1,
            'messenger_type_id' => 1,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/solicitudes',
        ]);

        Messenger::create([
            'description' => 'Me falta tinta en mi impresora',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 4,
            'messenger_type_id' => 1,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/solicitudes',
        ]);

        Messenger::create([
            'description' => 'Deberias cambiar con mayor cuidado el toner de la impresora',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 4,
            'messenger_type_id' => 2,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/recomendaciones',
        ]);

        Messenger::create([
            'description' => 'Deberias tratar bien a las personas',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 4,
            'messenger_type_id' => 2,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/recomendaciones',
        ]);

        Messenger::create([
            'description' => 'Deberias ser mas rapido',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 4,
            'messenger_type_id' => 2,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/recomendaciones',
        ]);

        Messenger::create([
            'description' => 'Sigue fallando la impresora',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 4,
            'messenger_type_id' => 3,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/reclamos',
        ]);

        Messenger::create([
            'description' => 'mi celular sigue averiado',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 1,
            'messenger_type_id' => 3,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/reclamos',
        ]);

        Messenger::create([
            'description' => 'No funciona la red que reparaste',
            'date_request' => Carbon::now(),
            // 'date_accept' => '',
            // 'date_finish' => '',
            'conclution' => '',

            'support_id' => 1,
            'client_id' => 3,

            'categorie_id' => 3,
            'messenger_type_id' => 3,
            'messenger_status_id' => 1,

            'table' => 'messengers',
            'redirect' => '/messengers/reclamos',
        ]);

    }
}
