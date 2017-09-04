<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{

    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test * */
    public function a_user_can_view_all_threads()
    {
        $this->get('/threads/')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
        $this->get("/threads/{$this->thread->channel->slug}/{$this->thread->id}")
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $this->get("/threads/{$this->thread->channel->slug}/{$this->thread->id}")
            ->assertSee($reply->body);
    }

    /** @test */

    public function a_user_can_filter_threads_according_to_a_channel()
    {
        $channel = factory('App\Channel')->create();
        $threadInChannel = factory('App\Thread')->create(['channel_id' => $channel->id]);
        $threadNotInChannel = factory('App\Thread')->create();

        $this->get("/threads/{$channel->slug}")
            ->assertSee($threadInChannel->title)
            ->assertDontSee($threadNotInChannel->title);
    }

    /** @test */

    public function a_user_can_filter_threads_by_any_username()
    {
        $this->be(factory('App\User')->create(['name' => 'JohnDoe']));

        $threadByJohn = factory('App\Thread')->create(['user_id' => auth()->id()]);
        $threadNotByJohn = factory('App\Thread')->create();

        $this->get('threads/?by=JohnDoe')
            ->assertSee($threadByJohn->title)
            ->assertDontSee($threadNotByJohn->title);
    }


}
