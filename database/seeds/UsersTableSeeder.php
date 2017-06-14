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
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Director',
            'descripcion' => 'Director',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Profesor',
            'descripcion' => 'Profesor',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Recurso Humano',
            'descripcion' => 'Recurso Humano',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'DACE',
            'descripcion' => 'DACE',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'MANTENIMIENTO BASE DE DATOS',
            'descripcion' => 'MANTENIMIENTO BASE DE DATOS',
        ]);
        DB::table('users')->insert([
            'name' => 'Javier',
            'email' => 'javier@gmail.com',
            'password' => bcrypt('1234'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'roles_id' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Jesus',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('root'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'roles_id' => '1'
        ]);
        

        DB::table('users')->insert([

            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('1234'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'roles_id' => '6'
        ]);
    }
}
