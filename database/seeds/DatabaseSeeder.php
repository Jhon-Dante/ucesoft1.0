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
    }
}