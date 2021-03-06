<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Poem;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use App\Rules\Recaptcha;

class createPoemTest extends TestCase
{
    use RefreshDatabase, MockeryPHPUnitIntegration ;

    public function setUp()
    {
        parent::setUp();
        app()->singleton(Recaptcha::class, function () {
            return \Mockery::mock(Recaptcha::class, function ($m) {
                $m->shouldReceive('passes')->andReturn(true);
            });
        });
    }
        /** @test */
        public function an_unauthenticated_user_cannot_create_a_poem()
        {


            $this->expectException('Illuminate\Auth\AuthenticationException');
    
           
           //make a Poem
        $poem= make('App\Poem');
      
        //create the url and pass the poem to it 
        $this->post('/poems',$poem->toArray());
    
    
    
        }
    /** @test */
    public function an_authenticated_user_can_create_a_poem()
    {

        //given we have an_authenticated_user
        $this->signIn();
        //make a Poem
        $poem= make('App\Poem');
      
        //create the url and pass the poem to it 
       $response =  $this->post('/poems',$poem->toArray() + ['g-recaptcha-response' => 'token']);
       
        //make sure we see the body and the title in poem page
        $this->get($response->headers->get('location'))
        ->assertSee($poem->title)
        ->assertSee($poem->body);


    }
    /** @test */
    public function an_unauthenticated_user_cannot_see_the_create_poem_page()
    {

      
        $this->expectException('Illuminate\Auth\AuthenticationException');
        // user cannot go to create page 
        $this->get('/poems/create');


    }

    
    /** @test */
    function a_poem_required_a_title()
    
    {
        $this->publish_a_poem(['title' =>null]) 
        ->assertSessionHasErrors('title');   
    
    }

        
    /** @test */
    function a_poem_required_a_body()
    
    {
        
        $this->publish_a_poem(['body' =>null])        
        ->assertSessionHasErrors('body');   
    
    }
    /** @test */
    function a_poem_required_a_channal()
    
    {
        factory('App\Poem',2)->create();
        
        $this->publish_a_poem(['channel_id' =>null])        
        ->assertSessionHasErrors('channel_id');

        $this->publish_a_poem(['channel_id' =>999])        
        ->assertSessionHasErrors('channel_id'); 
       
    
    }
/**@test */
    public function publish_a_poem($overrides = [])
    {


        $this->expectException('Illuminate\Validation\ValidationException');


        $this->signIn();
        $poem = make('App\Poem', $overrides);
        return $this->post('/poems',$poem->toArray());
        
    }
    /** @test */
    public function authrised_user_may_delete_a_poem()
    {
        $this->signIn();
        $poem = create('App\Poem',['user_id'=>auth()->id()]);
        $reply = create('App\Reply',['poem_id' =>$poem->id]);


        $this->Json('DELETE',$poem->path());

        $this->assertDatabaseMissing('poems',['id'=>$poem->id]);
        $this->assertDatabaseMissing('replies',['id'=>$reply->id]);
        $this->assertDatabaseMissing('activities',[
            
            'subject_id' =>$poem->id,
            'subject_type' =>get_class($poem)
            
            ]);
            $this->assertDatabaseMissing('activities',[
            
                'subject_id' =>$reply->id,
                'subject_type' =>get_class($reply)
                
                ]);
    
    



        
    }

      /** @test */
      public function unauthrised_user_maynot_delete_a_poem()
      {
         $this->withExceptionHandling();

        $poem = create('App\Poem');
          
  
          $this->delete($poem->path())->assertRedirect('/login'); 
          
          $this->signIn();
          $this->delete($poem->path())->assertStatus(403); 
      }
           
        /** @test */
    function a_poem_requires_a_unique_slug()
    {
        $this->signIn();
        $poem = create('App\Poem', ['title' => 'Foo Title']);
        $this->assertEquals($poem->slug, 'foo-title');
        $poem = $this->postJson(route('poems'), $poem->toArray()+ ['g-recaptcha-response' => 'token'])->json();
        $this->assertEquals("foo-title-".md5($poem['id']), $poem['slug']);
    }
    /** @test */
    function a_poem_with_a_title_that_ends_in_a_number_should_generate_the_proper_slug()
    {
        $this->signIn();
        $poem = create('App\Poem', ['title' => 'Some Title 24']);
        $poem = $this->postJson(route('poems'), $poem->toArray() + ['g-recaptcha-response' => 'token'])->json();
        $this->assertEquals("some-title-24-". md5($poem['id']), $poem['slug']);
    }

     /** @test */
     function a_poem_requires_recaptcha_verification()
     {
         unset(app()[Recaptcha::class]);
         $this->publish_a_poem(['g-recaptcha-response' => 'test'])
             ->assertSessionHasErrors('g-recaptcha-response');
     }
}
