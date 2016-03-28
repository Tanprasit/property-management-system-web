<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Device;
use App\User;

class DevicesTest extends TestCase
{
    use DatabaseTransactions;

    protected $modelUrl = '/devices/';

    public function testDeviceCreate() {
        $admin = User::find(1);
        $device = factory(App\Device::class)->create();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $device->id )
            ->see($device->model);
    }

    public function testDeviceUpdate() {
        $device = new Device();

        $device->model = "Nexus 6P";
        $device->manufacturer = "LGE";
        $device->product = "bullhead";
        $device->sdk_version = "23";
        $device->serial_number = "009f582e7941a8e7";
        $device->latitude = "51.5034070";
        $device->longitude = "-0.1275920";

        $device->save();

        $savedDevice = Device::where('serial_number', '=', '009f582e7941a8e7')->first();

        $this->assertTrue($savedDevice->manufacturer == 'LGE');
    }

    public function testDeviceDelete() {
        $admin = User::find(1);
        $device = new Device();

        $device->model = "Nexus 6P";
        $device->manufacturer = "LGE";
        $device->product = "bullhead";
        $device->sdk_version = "23";
        $device->serial_number = "009f582e7941a8e7";
        $device->latitude = "51.5034070";
        $device->longitude = "-0.1275920";

        $device->save();

        $savedDevice = Device::where('serial_number', '=', '009f582e7941a8e7')->first();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $savedDevice->id )
            ->press('Delete')
            ->seePageIs($this->modelUrl);
    }
}
