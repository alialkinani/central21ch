<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class profileTest extends TestCase
{
    /** @test */
    public function a_user_has_profile()
    {
        $user = create('App\User');
        $this->get('/profile/'. $user->name )
        ->assertSee($user->name);
    }
    /** @test */
    public function a_profile_show_all_the_poems_created_by_the_user()
    {
        $this->signIn();
        $poem =create('App\Poem',['user_id' => auth()->id()]);

    
        $this->get('/profile/'. auth()->user()->name )
        ->assertSee($poem->title)
        ->assertSee($poem->body);
    }
}
