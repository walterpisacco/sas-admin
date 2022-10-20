<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'id' => 1,
            'cuit'=> '33-68730910-9',
            'nombre' =>'Aktis Argentina',
            'razon_social' => 'Aktis SA',
            'direccion' => 'Feijoo 916',
            'id_pais' =>1,
            'estado' => 1
        ]);

        Client::create([
            'id' => 2,
            'cuit'=> '33-68730910-1',
            'nombre' =>'Telefonica',
            'razon_social' => 'Telefonica SA',
            'direccion' => '',
            'id_pais' =>1,
            'estado' => 1
        ]);

        Client::create([
            'id' => 3,
            'cuit'=> '33-68730910-2',
            'nombre' =>'Claro Argentina',
            'razon_social' => 'Claro SA',
            'direccion' => '',
            'id_pais' =>1,
            'estado' => 1
        ]);
    }
}
