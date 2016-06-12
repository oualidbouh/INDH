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
         $this->call(laboratoireSeeder::class);
         $this->call(societeSeeder::class);
         $this->call(architecteSeeder::class);
         $this->call(maitreOuvrageSeeder::class);
         $this->call(betSeeder::class);
         $this->call(DecomptesSeeder::class);
         
    }
}
