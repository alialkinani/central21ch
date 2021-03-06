<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;
        /** @test */
        public function an_unauthenticated_user_cannot_participate_in_forum()
        {


            $this->expectException('Illuminate\Auth\AuthenticationException');
    
           
          
            //Add existing Poem
            $poem= create('App\Poem');
            //make a reply
            $reply = make('App\Reply');
            //create the url and pass the reply to it 
            $this->post($poem->path().'/replies',$reply->toArray());
    
    
    
        }
    /** @test */
    public function an_authenticated_user_can_participate_in_forum_poem()
    {

        //given we have an_authenticated_user
        $this->signIn();
        //Add existing Poem
        $poem= create('App\Poem');
        //make a reply
        $reply = make('App\Reply');
        //create the url and pass the reply to it 
       
        $this->post($poem->path().'/replies',$reply->toArray());

        //make sure we see the reply in poem page
        $this->assertDatabaseHas('replies',['body'=>$reply->body]);
        $this->assertEquals(1,$poem->fresh()->replies_count);
        


    }
   
    
     /** @test */
     public function an_authenticated_user_can_update_reply()
     {
 
         //given we have an_authenticated_user
         $this->signIn();
         //Add existing Poem
       
         //create a reply
         $reply = create('App\Reply', ['user_id'=>auth()->id()]);
         //create the url and pass the reply to it 
        $newbody= 'the body has updated';
         $this->patch("/replies/{$reply->id}",['body'=>$newbody]);
 
         //make sure we see the update  body

         $this->assertDatabaseHas('replies',['id'=>$reply->id,'body'=>$newbody]);
 
     }
     /** @test */
     public function unauthrised_user_maynot_update_a_reply()
     {
        $this->withExceptionHandling();

         $reply = create('App\Reply');
         
 
         $this->patch("/replies/{$reply->id}")->assertRedirect('/login'); 
         
         $this->signIn();
         $this->patch("/replies/{$reply->id}")->assertStatus(302); 
     }
      /** @test */
      public function unauthrised_user_maynot_delete_a_reply()
      {
         $this->withExceptionHandling();

          $reply = create('App\Reply');
          
  
          $this->delete("/replies/{$reply->id}")->assertRedirect('/login'); 
          
          $this->signIn();
          $this->delete("/replies/{$reply->id}")->assertStatus(403); 
      }

      /** @test */
      public function authrised_user_can_delete_a_reply()
      {
         
          $this->signIn();
          $reply = create('App\Reply',['user_id'=>auth()->id()]);               
  
          $this->delete("/replies/{$reply->id}");
          $this->assertDatabaseMissing('replies',['id'=>$reply->id]);
          $this->assertDatabaseMissing('activities',[
      
              'subject_id' =>$reply->id,
              'subject_type' =>get_class($reply)
              
              ]);
              $this->assertEquals(0,$reply->poem->fresh()->replies_count);
  
      
      }
      
        /** @test */
        function replies_that_contain_spam_may_not_be_created()
        {
            $this->withExceptionHandling();

            $this->signIn();
            $poem = create('App\Poem');
            $reply = make('App\Reply', [
                'body' => 'Yahoo Customer Support'
            ]);
            $this->json('post',$poem->path() . '/replies', $reply->toArray())
                ->assertStatus(422);
        }
        /** @test */
        function users_may_only_reply_a_maximum_of_once_per_minute()
        {
            $this->withExceptionHandling();
            $this->signIn();
            $poem = create('App\Poem');
            $reply = make('App\Reply');
            $this->json('post',$poem->path() . '/replies', $reply->toArray())
                ->assertStatus(201);
            $this->post($poem->path() . '/replies', $reply->toArray())
                ->assertStatus(429); 
        }

      

       
}
