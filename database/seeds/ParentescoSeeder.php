<?php

use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Madre'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Padre'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Hermano(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Tio(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Abuelo(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Primo(a)'
        ));
    }
}
