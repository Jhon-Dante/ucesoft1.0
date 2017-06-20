<?php

use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_pago')->insert(array(
        	'tipoPago' => 'Efectivo'
        ));
        \DB::table('tipo_pago')->insert(array(
        	'tipoPago' => 'Depósito'
        ));
        \DB::table('tipo_pago')->insert(array(
        	'tipoPago' => 'Transferencia'
        ));
    }
}
