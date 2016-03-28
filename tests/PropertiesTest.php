<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Property;

class PropertiesTest extends TestCase
{
    use DatabaseTransactions;

    protected $modelUrl = '/properties/';

    public function testNotificationCreate() {
        $admin = User::find(1);
        $property = factory(App\Property::class)->create();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $property->id )
            ->see($property->postcode);
    }

    public function testNotificationUpdate() {
        $property = new Property();

        $property->address_line_1 = "123 Fake Street";
        $property->address_line_2 = "Number 3";
        $property->city = "Test City";
        $property->county = "Test County";
        $property->postcode = "FR123KE";

        $property->save();

        $savedProperty = Property::where('postcode', '=', 'FR123KE')->first();

        $this->assertTrue($savedProperty->address_line_1 == '123 Fake Street');
    }

    public function testNotificationDelete() {
        $admin = User::find(1);
        $property = new Property();

        $property->address_line_1 = "123 Fake Street";
        $property->address_line_2 = "Number 3";
        $property->city = "Test City";
        $property->county = "Test County";
        $property->postcode = "FR123KE";

        $property->save();

        $savedProperty = Property::where('postcode', '=', 'FR123KE')->first();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $savedProperty->id )
            ->press('Delete')
            ->seePageIs($this->modelUrl);
    }
}
