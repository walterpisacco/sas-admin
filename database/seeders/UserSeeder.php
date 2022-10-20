<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            //'id' => 1,
            'id_client' => 1,
            'name'=> 'Walter Pisacco',
            'email' =>'wpisacco@gmail.com',
            'rol' =>'Admin',
            'password' =>Hash::make('password'),
        ]);
    }
}
