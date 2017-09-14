<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInThreadsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */

    public function unauthenticated_users_may_not_add_replies()
    {
        $this->withExceptionHandling()
            ->post('/threads/1/replies', [])
            ->assertRedirect('/login');
    }


    /** @test */

    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be($user = factory('App\User')->create());

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();

        $this->post("threads/{$thread->id}/replies", $reply->toArray());

        $this->get("threads/{$thread->channel->slug}/{$thread->id}")
            ->assertSee($reply->body);
    }

    /** @test */

    public function a_reply_requires_a_body()
    {
        $this->withExceptionHandling()
            ->be(factory('App\User')->create());

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make(['body' => null]);

        $this->post("threads/{$thread->id}/replies", $reply->toArray())
            ->assertSessionHasErrors('body');

    }

}
