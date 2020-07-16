<?php

use Illuminate\Database\Seeder, \Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email'=>'teste@email',
            'password'=>Hash::make('senha')
        ]);
    }
}
