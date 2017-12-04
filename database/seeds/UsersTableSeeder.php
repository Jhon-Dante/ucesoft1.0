<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Javier',
            'email' => 'javier@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Administrador(a)'
        ]);
        
        DB::table('users')->insert([
            'name' => 'Jesus',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Administrador(a)'
        ]);
    }
}
