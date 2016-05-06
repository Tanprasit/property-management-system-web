<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Key;
use App\Property;

class KeysTest extends TestCase
{

    use DatabaseTransactions;

    protected $modelUrl = '/keys/';

    public function testKeyCreate() {
        $admin = User::find(1);
        $property = factory(App\Property::class)->create();
        $key = new Key();

        $key->taken_at = "2016-05-04 19:34:16";
        $key->returned_at = "2016-05-04 19:34:19";
        $key->pin = "7776";
        $key->property_id = $property->id;
        $key->user_id = $admin->id;

        $key->save();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $key->id )
            ->see($key->pin)
            ->assertResponseStatus('200');
    }

    public function testKeyUpdate() {
        $admin = User::find(1);
        $property = factory(App\Property::class)->create();
        $newKey = new Key();

        $newKey->taken_at = "2016-05-04 19:34:16";
        $newKey->returned_at = "2016-05-04 19:34:19";
        $newKey->pin = "7776";
        $newKey->property_id = $property->id;
        $newKey->user_id = $admin->id;

        $newKey->save();

        $key = Key::find($newKey->id);
        $key->pin = "1234";

        $key->save();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $key->id )
            ->assertTrue($key->pin == '1234');
    }

    public function testKeyDelete() {
        $admin = User::find(1);
        $property = factory(App\Property::class)->create();
        $newKey = new Key();

        $newKey->taken_at = "2016-05-04 19:34:16";
        $newKey->returned_at = "2016-05-04 19:34:19";
        $newKey->pin = "7776";
        $newKey->property_id = $property->id;
        $newKey->user_id = $admin->id;

        $newKey->save();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $newKey->id )
            ->press('Delete')
            ->seePageIs($this->modelUrl)
            ->assertResponseStatus('200');
    }
}
