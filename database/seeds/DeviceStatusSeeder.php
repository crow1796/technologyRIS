<?php

use Illuminate\Database\Seeder;

class DeviceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();
        $status = [
        	['name' => 'New', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
        	['name' => 'Used', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
        	['name' => 'Damaged', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
        	['name' => 'Repaired', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
        	['name' => 'Dumped', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
        ];
        DB::table('status')->insert($status);
    }
}
