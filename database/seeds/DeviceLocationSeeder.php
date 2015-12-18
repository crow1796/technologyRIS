<?php

use Illuminate\Database\Seeder;

class DeviceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();

        $locations = [
        	['name' => 'Faculty', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()]
        ];
        
        DB::table('locations')->insert($locations);
    }
}
