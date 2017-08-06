<?php

use Illuminate\Database\Seeder;

class RecaudosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recaudos')->insert([
            'part_nac' => 'Si',
            'boleta_v' => 'Si',
            'ci' => 'Si',
            'fotos' => 'Si',
            'ci_repre' => 'Si',
            'foto_repre' => 'Si',
            'cer_promo' => 'Si',
            'cer_calif' => 'Si',
            'solv_a' => 'Si',
            'tim_fis' => 'Si',
            'const_tra' => 'Si',
            'carpeta_m' => 'Si',
            'id_datosBasicos' => 1
            
        ]);
        DB::table('recaudos')->insert([
            'part_nac' => 'Si',
            'boleta_v' => 'Si',
            'ci' => 'Si',
            'fotos' => 'Si',
            'ci_repre' => 'Si',
            'foto_repre' => 'Si',
            'cer_promo' => 'Si',
            'cer_calif' => 'Si',
            'solv_a' => 'Si',
            'tim_fis' => 'Si',
            'const_tra' => 'Si',
            'carpeta_m' => 'Si',
            'id_datosBasicos' => 3
            
        ]);
        DB::table('recaudos')->insert([
            'part_nac' => 'Si',
            'boleta_v' => 'Si',
            'ci' => 'Si',
            'fotos' => 'Si',
            'ci_repre' => 'Si',
            'foto_repre' => 'Si',
            'cer_promo' => 'Si',
            'cer_calif' => 'Si',
            'solv_a' => 'Si',
            'tim_fis' => 'Si',
            'const_tra' => 'Si',
            'carpeta_m' => 'Si',
            'id_datosBasicos' => 3
            
        ]);
        DB::table('recaudos')->insert([
            'part_nac' => 'Si',
            'boleta_v' => 'Si',
            'ci' => 'Si',
            'fotos' => 'Si',
            'ci_repre' => 'Si',
            'foto_repre' => 'Si',
            'cer_promo' => 'Si',
            'cer_calif' => 'Si',
            'solv_a' => 'Si',
            'tim_fis' => 'Si',
            'const_tra' => 'Si',
            'carpeta_m' => 'Si',
            'id_datosBasicos' => 4
            
        ]);

    }
}
