<?php

use Illuminate\Database\Seeder;

class DatosBasicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '11999543',
            'nombres' => 'Carlos Adolfo',
            'apellidos' => 'Garcia Campos',
            'lugar_nac' => 'Hospital de Clínicas Araguas, La Victoria',
            'estado' => 'Aragua',
            'fecha_nac' => '2005-05-23',
            'edad' => '12',
            'sexo' => '1',
            'peso' => '37',
            'talla' => 'M',
            'salud' => 'Alergias al Maní',
            'direccion' => 'Calle Santiago Mariño, casa nro. 34',
            'madre' => 'Alicia Pérez',
            'vive_m' => 'Si',
            'padre' => 'Johan Jaeger',
            'vive_p' => 'Si'
        ]);

        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'E',
            'cedula' => '00002323211999543',
            'nombres' => 'Simón Alberto',
            'apellidos' => 'Farías Ramos',
            'lugar_nac' => 'Hospital di Sao Paulo, Brassilia',
            'estado' => 'Rio di Janeiro',
            'fecha_nac' => '2006-05-23',
            'edad' => '13',
            'sexo' => '2',
            'peso' => '43',
            'talla' => 'S',
            'salud' => 'Atismatismo',
            'direccion' => 'Calle Soubllette, casa nro. 99',
            'madre' => 'Jhonatan Nascimento',
            'vive_m' => 'No',
            'padre' => 'Elicia Forza',
            'vive_p' => 'Si'
        ]);

        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '25071215',
            'nombres' => 'Emily Daniela',
            'apellidos' => 'Rodriguez Ávila',
            'lugar_nac' => 'Clínica Simón Bolívar, Las Mercedes',
            'estado' => 'Caracas',
            'fecha_nac' => '2005-03-01',
            'edad' => '12',
            'sexo' => '2',
            'peso' => '40',
            'talla' => 'S',
            'salud' => 'Sordera, Taquicardia',
            'direccion' => 'Calle Mariano Montilla, casa nro. 03',
            'madre' => 'Maria Buscamante',
            'vive_m' => 'No',
            'padre' => 'Jhonson Cheeperd',
            'vive_p' => 'Si'
        ]);

        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '20653434',
            'nombres' => 'Freddy Angel ',
            'apellidos' => 'Montilla de los Soles',
            'lugar_nac' => 'Hospital de Clínicas Achaguas, La Victoria',
            'estado' => 'Aragua',
            'fecha_nac' => '2004-03-29',
            'edad' => '13',
            'sexo' => '1',
            'peso' => '40',
            'talla' => 'S',
            'salud' => 'Fractura en la Rodilla izquierda',
            'direccion' => 'Las Mercedes, Urb. El Bosque, Apart. 3, hab. 11',
            'madre' => 'Wendy Sosa',
            'vive_m' => 'Si',
            'padre' => 'Winston Mara',
            'vive_p' => 'Si'
        ]);

    }
}
