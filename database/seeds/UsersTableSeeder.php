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
        
        DB::table('users')->insert([

            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Basica'
        ]);

        DB::table('users')->insert([

            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Media General'
        ]);

        DB::table('users')->insert([

            'name' => 'Ricardo',
            'email' => 'ricardo@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Preescolar'
        ]);
    }
}
