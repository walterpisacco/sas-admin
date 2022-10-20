<?php

namespace Database\Seeders;

use App\Models\TypeOfCase;
use Illuminate\Database\Seeder;

class TypeOfCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TypeOfCase::create([
           'nombre' => 'Caso 1',
       ]); 

        TypeOfCase::create([
           'nombre' => 'Caso 2',
        ]);
    }
}
