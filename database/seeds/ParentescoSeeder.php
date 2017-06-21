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
        	'parentesco' => 'Hijo(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Hijastro(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Nieto(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Sobrino(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Hermano(a)'
        ));
        \DB::table('parentesco')->insert(array(
        	'parentesco' => 'Primo(a)'
        ));
    }
}
