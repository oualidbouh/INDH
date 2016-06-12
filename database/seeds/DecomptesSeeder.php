<?php

use Illuminate\Database\Seeder;

class DecomptesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('decomptes')->truncate();
        $decomptes = array(
        	[
        		'decompte_id'  => 1,
        		'marche_id' => 1,
        		'montant' => 20000
        		
        	],
        	[
        		'decompte_id'  => 2,
        		'marche_id' => 1,
        		'montant' => 1000
        		
        	],
        	[
        		'decompte_id'  => 3,
        		'marche_id' => 1,
        		'montant' => 9999
        		
        	],
        	[
        		'decompte_id'  => 4,
        		'marche_id' => 2,
        		'montant' => 5000
        		
        	]
        	);
         DB::table('decomptes')->insert($decomptes);
    }
}
