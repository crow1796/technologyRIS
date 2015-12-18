<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        $permissions = [
        	['name' => 'Admin', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
        	['name' => 'System User', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()]
        ];
        DB::table('permissions')->insert($permissions);
    }
}
