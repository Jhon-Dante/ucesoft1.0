<?php

use Illuminate\Database\Seeder;

class PagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <=12 ; $i++) { 
    		
        DB::table('pagos')->insert([
            'id_mes' => $i,
            'monto' => 22576.00,
            'id_periodo' => 2
            ]);

    	}
    }
}
