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
            'id_representante' => 1,
            'id_parentesco' => 1
            
        ]);

        DB::table('inscripcion')->insert([  
            'id_datosBasicos' => 1,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 2,
            'id_seccion' => 2
        ]);
        for ($i=9; $i <=12 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 1,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }
         for ($i=1; $i <=8 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 1,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }

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
            'id_representante' => 2,
            'id_parentesco' => 1
            
        ]);

         DB::table('preinscripcion')->insert([  
            'id_datosBasicos' => 2,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 1,
            'id_seccion' => null
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
            'id_representante' => 1,
            'id_parentesco' => 1
            
        ]);

        DB::table('preinscripcion')->insert([  
            'id_datosBasicos' => 3,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 1,
            'id_seccion' => 2
        ]);

        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '20611434',
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
            'id_representante' => 3,
            'id_parentesco' => 1
            
        ]);

        DB::table('inscripcion')->insert([  
            'id_datosBasicos' => 4,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 1,
            'id_seccion' => 14
        ]);
        for ($i=9; $i <=12 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 2,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);    
        }
        for ($i=1; $i <=8 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 2,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }
        
        
//----segundo inscrito
        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '206411434',
            'nombres' => 'John Jesús',
            'apellidos' => 'Baddour Morgado',
            'lugar_nac' => 'Hospital de Clínicas Achaguas, La Victoria',
            'estado' => 'Aragua',
            'fecha_nac' => '2004-05-29',
            'edad' => '13',
            'sexo' => '1',
            'peso' => '40',
            'talla' => 'S',
            'salud' => 'Fractura en la Rodilla izquierda',
            'direccion' => 'Las Mercedes, Urb. El Bosque, Apart. 3, hab. 11',
            'id_representante' => 1 ,               
            'id_parentesco' => 1
            
        ]);

        DB::table('inscripcion')->insert([  
            'id_datosBasicos' => 5,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 2,
            'id_seccion' => 14
        ]);
        
        for ($i=9; $i <=12 ; $i++) { 
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 3,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }  
        for ($i=1; $i <=8 ; $i++) { 
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 3,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }
        

//----tercer inscrito
        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '20111434',
            'nombres' => 'Martín',
            'apellidos' => 'Lutero',
            'lugar_nac' => 'Hospital de Clínicas Achaguas, La Victoria',
            'estado' => 'Aragua',
            'fecha_nac' => '2004-01-29',
            'edad' => '13',
            'sexo' => '1',
            'peso' => '40',
            'talla' => 'S',
            'salud' => 'Fractura en la Rodilla izquierda',
            'direccion' => 'Las Mercedes, Urb. El Bosque, Apart. 3, hab. 11',
            'id_representante' => 3,
            'id_parentesco' => 1
            
        ]);

        DB::table('inscripcion')->insert([  
            'id_datosBasicos' => 6,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 2,
            'id_seccion' => 14
        ]);
        for ($i=9; $i <=12 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 4,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }
        for ($i=1; $i <=8 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 4,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);   
        }
        

//----cuarto inscrito
        DB::table('datos_basicos')->insert([
            'nacionalidad' => 'V',
            'cedula' => '20212314',
            'nombres' => 'Elva',
            'apellidos' => 'Lazo',
            'lugar_nac' => 'Hospital de Clínicas Achaguas, La Victoria',
            'estado' => 'Aragua',
            'fecha_nac' => '2011-12-29',
            'edad' => '6',
            'sexo' => '1',
            'peso' => '40',
            'talla' => 'S',
            'salud' => 'Fractura en la Rodilla izquierda',
            'direccion' => 'Las Mercedes, Urb. El Bosque, Apart. 3, hab. 11',
            'id_representante' => 3,
            'id_parentesco' => 1
            
        ]);

        DB::table('inscripcion')->insert([  
            'id_datosBasicos' => 7,
            'repite' => 'No',
            'pendiente' => 'No',
            'id_periodo' => 2,
            'id_seccion' => 1
        ]);
        for ($i=9; $i <=12 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 5,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }
        for ($i=1; $i <=8 ; $i++) {  
        DB::table('mensualidades')->insert([ 
            'id_inscripcion' => 5,
            'id_pago' => $i,
            'estado' => 'Sin pagar',
            'forma_pago' => 1,
            'codigo_operacion' => ''
        ]);
        }
        
    }
}
