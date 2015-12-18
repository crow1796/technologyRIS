<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(DeviceLocationSeeder::class);
        $this->call(DeviceTypeSeeder::class);
        $this->call(DeviceStatusSeeder::class);
        // $this->call(DeviceSeeder::class);
        $this->call(PermissionTableSeeder::class);

        Model::reguard();
    }
}
