<?php

use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        $types = [
        	['name' => 'Cellphone', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
            ['name' => 'Laptop', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()]
        ];
        DB::table('types')->insert($types);
    }
}
