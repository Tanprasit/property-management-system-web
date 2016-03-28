<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ContractorsTest extends TestCase
{

    use DatabaseTransactions;

    protected $modelUrl = '/contractors/';

    public function testContractorCreate() {
        $admin = User::find(1);
        $contractor = factory(App\User::class)->create();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $contractor->id )
            ->see($contractor->full_name);
    }

    public function testContractorUpdate() {
        $contractor = new User();

        $contractor->full_name = "Test User";
        $contractor->email = "Test@gmail.com";
        $contractor->mobile = "07576789877";
        $contractor->password = "Test@1234";
        $contractor->status = "admin";

        $contractor->save();

        $savedContractor = User::where('full_name', '=', 'Test User')->first();

        $this->assertTrue($savedContractor->email == 'Test@gmail.com');
    }

    public function testContacterDelete() {
        $admin = User::find(1);
        $contractor = new User();

        $contractor->full_name = "Test User";
        $contractor->email = "Test@gmail.com";
        $contractor->mobile = "07576789877";
        $contractor->password = "Test@1234";
        $contractor->status = "admin";

        $contractor->save();

        $savedContractor = User::where('full_name', '=', 'Test User')->first();

        $this->actingAs($admin)
            ->withSession(['foo' => 'bar'])
            ->visit($this->modelUrl . (String) $savedContractor->id )
            ->press('Delete')
            ->seePageIs($this->modelUrl);
    }
}
