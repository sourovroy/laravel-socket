<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PluginCRUDTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanCreateAndReceiveMessage()
    {
        $userOne = factory('App\User')->create();
        $userTwo = factory('App\User')->create();

        $messages = $userOne->messages()->create([
            'receiver_id' => $userTwo->id,
            'messages'    => 'Simple message',
        ]);

        $this->assertEquals( $userOne->id, $messages->owner_id );

        $this->assertEquals( $userTwo->id, $messages->receiver_id );
    }

}
