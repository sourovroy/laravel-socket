<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthUserCanSendMessage()
    {
        $userOne = factory('App\User')->create();
        $userTwo = factory('App\User')->create();

        $this->actingAs( $userOne );

        $response = $this->postJson( '/messages', [
            'receiver_id' => $userTwo->id,
            'messages'    => 'Simple message',
        ] );

        $response->assertStatus( 201 )
                 ->assertJson( [
                     'owner_id' => $userOne->id,
                 ] );
    }
}
