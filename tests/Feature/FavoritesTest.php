<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */

    public function an_unauthenticated_user_cant_favorite_anything()
    {
        $this->withExceptionHandling()
            ->post("threads/1/favorites")
            ->assertRedirect('/login');
    }


    /** @test */
    public function an_authenticated_user_can_favorite_any_thread_reply()
    {
        $this->signIn();

        $reply = factory('App\Reply')->create();

        $this->post("threads/{$reply->id}/favorites");

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */

    public function an_authenticated_user_may_favorite_a_reply_once()
    {
        $this->signIn();

        $reply = factory('App\Reply')->create();

        try{
            $this->post("threads/{$reply->id}/favorites");
            $this->post("threads/{$reply->id}/favorites");
        }catch (\Exception $e){
            $this->fail('Can\'t favorite a reply more than once.');
        }

        $this->assertCount(1, $reply->favorites);
    }

}
