<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PeriodoSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(AsignaturasTableSeeder::class);
        $this->call(DiasTableSeeder::class);
        $this->call(MesesSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(ParentescoSeeder::class);
        $this->call(BloquesTableSeeder::class);
        $this->call(Bloques2TableSeeder::class);
        $this->call(SeccionesTableSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(RepresentantesSeeder::class);
        $this->call(DatosBasicosSeeder::class);
        $this->call(Padres::class);
        $this->call(RecaudosTableSeeder::class);
        $this->call(AulasTableSeeder::class);
    }
}