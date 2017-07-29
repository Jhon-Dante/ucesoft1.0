<?php

use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Carlos Adolfo',
            'apellidos' => 'Garcia Campos',
            'nacionalidad' => 'V',
            'cedula' => '11999543',
            'fecha_nacimiento' => '1980-05-23',
            'edad' => '40',
            'edo_civil' => 'Soltero(a)',
            'direccion' => 'Calle Santiago Mariño, casa nro. 34',
            'genero' => '1',
            'codigo_hab' => '0',
            'telf_hab' => '8854854',
            'codigo_cel' => '3',
            'celular' => '4333233',
            'correo' => 'carlosagc90@live.com',
            'id_cargo' => '2'
        ]);

        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Maria Josefa',
            'apellidos' => 'Palacios',
            'nacionalidad' => 'E',
            'cedula' => '000068598348596838459',
            'fecha_nacimiento' => '1990-05-09',
            'edad' => '27',
            'edo_civil' => 'Casado(a)',
            'direccion' => 'Calle Antonio José de Sucre, apartamento los ruices, nro. 4, La Victoria.',
            'genero' => '0',
            'codigo_hab' => '0',
            'telf_hab' => '8854854',
            'codigo_cel' => '4',
            'celular' => '4333233',
            'correo' => 'mjosefap@live.com',
            'id_cargo' => '1'
        ]);

         DB::table('datos_basicos_personal')->insert([
            'nombres' => 'James',
            'apellidos' => 'Maslow',
            'nacionalidad' => 'E',
            'cedula' => '000068598348596838459',
            'fecha_nacimiento' => '1994-01-21',
            'edad' => '27',
            'edo_civil' => 'Viudo(a)',
            'direccion' => 'Calle wutemberg, apartamento The Sky, Whashinton D.C.',
            'genero' => '1',
            'codigo_hab' => '0',
            'telf_hab' => '3242344',
            'codigo_cel' => '3',
            'celular' => '9999898',
            'correo' => 'jamesmOficial@live.com',
            'id_cargo' => '3'
        ]);

         DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Mario',
            'apellidos' => 'Pistache',
            'nacionalidad' => 'E',
            'cedula' => '000068598348596838459',
            'fecha_nacimiento' => '1985-11-07',
            'edad' => '32',
            'edo_civil' => 'Concubino(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '0',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'marioelpistache@live.com',
            'id_cargo' => '4'
        ]);
    }
}
