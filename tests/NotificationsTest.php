<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Notification;

class NotificationsTest extends TestCase
{
    use DatabaseTransactions;

    protected $modelUrl = '/notifications/';

    public function testNotificationCreate() {
        $admin = User::find(1);
        $notification = factory(App\Notification::class)->create();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $notification->id )
            ->see($notification->title);
    }

    public function testNotificationUpdate() {
        $notification = new Notification();

        $notification->title = "Test title 123";
        $notification->type = "Alarm test";
        $notification->notes = "Test property ";
        $notification->data = "Test data";

        $notification->save();

        $savedDevice = Notification::where('title', '=', 'Test title 123')->first();

        $this->assertTrue($savedDevice->data == 'Test data');
    }

    public function testNotificationDelete() {
        $admin = User::find(1);
        $notification = new Notification();

        $notification->title = "Test title 123";
        $notification->type = "Alarm test";
        $notification->notes = "Test property ";
        $notification->data = "Test data ";

        $notification->save();


        $savedNotification = Notification::where('title', '=', 'Test title 123')->first();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $savedNotification->id )
            ->press('Delete')
            ->seePageIs($this->modelUrl);
    }
}
