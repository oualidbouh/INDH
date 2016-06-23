<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class decomptesSeeder extends Seeder
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
        		'marche_id' => 1,
        		'montant' => 20000,
        		"created_at" => Carbon::now()
    		],
    		[
        		'marche_id' => 1,
        		'montant' => 1000,
        		"created_at" => Carbon::now()
    		],
    		[
        		'marche_id' => 1,
        		'montant' => 9999,
        		"created_at" => Carbon::now()
    		],
    		[
        		'marche_id' => 2,
        		'montant' => 5000,
        		"created_at" => Carbon::now()
    		]
    		);
    	DB::table('decomptes')->insert($decomptes);
    }
}
