<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_has_an_owner()
    {
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf('App\User', $reply->owner);
    }

    /** @test */

    public function unauthenticated_users_may_not_add_replies()
    {
        $this->withExceptionHandling();

        $this->post('threads/1/replies', []);
    }


}
