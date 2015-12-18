<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->delete();
    	$devices = [];

    	for($counter = 0; $counter < 20; $counter++){
    		$devices[] = 
    			['name' => 'Demo '. $counter, 'type_id' => 1, 'status_id' => 1, 'location_id' => 1, 'model' => 'Demo '. $counter, 'brand' => 'Demo '. $counter, 'serial' => 'Demo '. $counter,
    			'description' => 'Demo '. $counter,'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()
    			];
    	}
        DB::table('devices')->insert($devices);
    }
}
