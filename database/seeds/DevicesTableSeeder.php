<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Device::class, 50)->create()->each(function($device) {
            $device->notifications()->save(factory(App\Notification::class)->make());
        });
    }
}

