<?php

use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('periodos')->insert(array(
        		'periodo' => '2016 - 2017',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2017 - 2018',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2018 - 2019',
        		'status' => 'Activo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2019 - 2020',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2020 - 2021',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2021 - 2022',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2022 - 2023',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2023 - 2024',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2024 - 2025',
        		'status' => 'Inactivo'
        	));
        \DB::table('periodos')->insert(array(
        		'periodo' => '2025 - 2026',
        		'status' => 'Inactivo'
        	));
    }
}
