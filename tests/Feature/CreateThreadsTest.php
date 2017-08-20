<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function only_an_authenticated_user_can_create_a_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->create();

        $this->post('/threads/', $thread->toArray());
    }

    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        $this->be(factory('App\User')->create());

        $thread = factory('App\Thread')->create();

        $this->post('/threads/', $thread->toArray());

        $this->get('threads/' . $thread->id)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

}
