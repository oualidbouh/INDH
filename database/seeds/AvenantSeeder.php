<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AvenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avenants')->truncate();

        $aves = array(
        		[
        			"marche_id" => 1,
        			"objet" => "marbre",
                    "montant" => 100,
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"marche_id" => 1,
        			"objet" => "painture",
                    "montant" => 100,
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"marche_id" => 1,
        			"objet" => "lampes",
                    "montant" => 100,
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"marche_id" => 1,
                    "montant" => 100,
        			"objet" => "carrelage",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],
        		[
        			"marche_id" => 1,
                    "montant" => 100,
        			"objet" => "grillage",
        			"created_at" => Carbon::now(),
        			"updated_at" => Carbon::now()
        		],

        	);

        DB::table('avenants')->insert($aves);
    }
}
