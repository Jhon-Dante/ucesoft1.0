<?php

use Illuminate\Database\Seeder;

class RepresentantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representantes')->insert([
        	'nacionalidad' => 'V',
        	'cedula' => '20212314',
        	'nombres' => 'Román César',
        	'apellidos' => 'Rodriguez Garcìa',
        	'profesion' => 'Electricista',
        	'id_parentesco' => '2',
        	'vive_estu' => 'Si',
        	'ingreso_apx' => '150000',
        	'n_familia' => '3',
        	'direccion' => 'Residencias El Recreo, apartamento 4, La Victoria',
            'email' => 'Roman@gmail.com',
        	'codigo_hab' => '0244',
        	'telf_hab' => '3334455',
        	'lugar_tra' => 'Equibanca C.A.',
        	'codigo_tra' => '0244',
        	'telf_tra' => '9984332',
        	'responsable_m' => 'Juan Carlos Mora',
        	'codigo_responsable' => '0412',
        	'telf_responsable' => '3451122',
        	'codigo_opcional' => '0244',
        	'telf_opcional' => '6786543',
        	'nombre_opcional' => 'Jennifer García',
        	'codigo_emergencia' => '0244',
        	'telf_emergencia' => '3454321'

        ]);
        DB::table('representantes')->insert([
        	'nacionalidad' => 'E',
        	'cedula' => '12343349',
        	'nombres' => 'Enrique María',
        	'apellidos' => 'Inglesias',
        	'profesion' => 'Cantante',
        	'id_parentesco' => '2',
        	'vive_estu' => 'No',
        	'ingreso_apx' => '450000',
        	'n_familia' => '1',
        	'direccion' => 'Hotel Lincon Park, Penthouse, Seattle, United State',
            'email' => 'Enrique@gmail.com',
        	'codigo_hab' => '0414',
        	'telf_hab' => '4343433',
        	'lugar_tra' => 'Pina Records',
        	'codigo_tra' => '0412',
        	'telf_tra' => '9984332',
        	'responsable_m' => 'Elizabeth Zerpa',
        	'codigo_responsable' => '0414',
        	'telf_responsable' => '4323323',
        	'codigo_opcional' => '0244',
        	'telf_opcional' => '6132122',
        	'nombre_opcional' => 'Carlos Vives',
        	'codigo_emergencia' => '0416',
        	'telf_emergencia' => '3432342'

        ]);
        DB::table('representantes')->insert([
        	'nacionalidad' => 'V',
        	'cedula' => '20212314',
        	'nombres' => 'Sofia',
        	'apellidos' => 'Nassuti',
        	'profesion' => 'Obrera',
        	'id_parentesco' => '1',
        	'vive_estu' => 'Si',
        	'ingreso_apx' => '150000',
        	'n_familia' => '3',
        	'direccion' => 'Residencias El Recreo, apartamento 4, La Victoria',
            'email' => 'Sofia@gmail.com',
        	'codigo_hab' => '0244',
        	'telf_hab' => '3334455',
        	'lugar_tra' => 'Equibanca C.A.',
        	'codigo_tra' => '0244',
        	'telf_tra' => '9984332',
        	'responsable_m' => 'Juan Carlos Mora',
        	'codigo_responsable' => '0412',
        	'telf_responsable' => '3451122',
        	'codigo_opcional' => '0244',
        	'telf_opcional' => '6786543',
        	'nombre_opcional' => 'Jennifer García',
        	'codigo_emergencia' => '0244',
        	'telf_emergencia' => '3454321'

        ]);
        DB::table('representantes')->insert([
        	'nacionalidad' => 'V',
        	'cedula' => '9876775',
        	'nombres' => 'Carmen',
        	'apellidos' => 'Tovar',
        	'profesion' => 'Plomera',
        	'id_parentesco' => '1',
        	'vive_estu' => 'Si',
        	'ingreso_apx' => '150000',
        	'n_familia' => '3',
        	'direccion' => 'Residencias El Recreo, apartamento 4, La Victoria',
            'email' => 'Carmen@gmail.com',
        	'codigo_hab' => '0244',
        	'telf_hab' => '3334455',
        	'lugar_tra' => 'Equibanca C.A.',
        	'codigo_tra' => '0244',
        	'telf_tra' => '9984332',
        	'responsable_m' => 'Juan Carlos Mora',
        	'codigo_responsable' => '0412',
        	'telf_responsable' => '3451122',
        	'codigo_opcional' => '0244',
        	'telf_opcional' => '6786543',
        	'nombre_opcional' => 'Jennifer García',
        	'codigo_emergencia' => '0244',
        	'telf_emergencia' => '3454321'

        ]);
        DB::table('representantes')->insert([
        	'nacionalidad' => 'V',
        	'cedula' => '8789654',
        	'nombres' => 'Shakira',
        	'apellidos' => 'Mebarak',
        	'profesion' => 'Cantante',
        	'id_parentesco' => '1',
        	'vive_estu' => 'Si',
        	'ingreso_apx' => '150000',
        	'n_familia' => '3',
        	'direccion' => 'Residencias Neverland',
            'email' => 'Shakira@gmail.com',
        	'codigo_hab' => '0244',
        	'telf_hab' => '3334455',
        	'lugar_tra' => 'Vevo',
        	'codigo_tra' => '0244',
        	'telf_tra' => '9984332',
        	'responsable_m' => 'Juan Carlos Mora',
        	'codigo_responsable' => '0412',
        	'telf_responsable' => '3451122',
        	'codigo_opcional' => '0244',
        	'telf_opcional' => '6786543',
        	'nombre_opcional' => 'Jennifer García',
        	'codigo_emergencia' => '0244',
        	'telf_emergencia' => '3454321'

        ]);
    }
}
