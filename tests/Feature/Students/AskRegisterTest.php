<?php

namespace Tests\Feature\Students;

use App\Events\AskRegisterEvent;
use App\Listeners\AskRegisterListener;
use App\Mail\ask_register;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AskRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_visitor_website_can_access_to_the_ask_register_page():void
    {
        //arrange

        //act
        $response = $this->get('/ask_register');

        $response->assertOk();
    }

    public function test_visitor_website_can_to_send_a_ask_registration():void
    {
        //arrange
        config(['queue.default' => 'database']);
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $user = [
            'name' => 'test',
            'lastname' => 'tester',
            'email' => 'test@test.com',
            'matricule' => '21-ESATIC0107C',
            'speciality' => 'developpeur',
            'number' => '0767046567',
            'image' => $file
        ];
        Mail::fake();
        Event::fake([
            AskRegisterEvent::class
        ]);

        //act
        Event::dispatch(AskRegisterEvent::class);
        $response = $this->post('/ask_register',$user);
        $maillable = new ask_register($user,$file);

        //assert
        $maillable->assertFrom($user['email']);
        $maillable->assertTo('aboubacarteguera@gmail.com');
        Mail::assertSent(ask_register::class);
        Event::assertListening(AskRegisterEvent::class,AskRegisterListener::class);
        $response->assertRedirect('/login');
    }

    public function test_visitor_website_want_send_a_ask_registration_with_empty_fields():void{

        //arrange
        $user = [
            'name' => '',
            'lastname' => '',
            'email' => '',
            'matricule' => '',
            'speciality' => '',
            'number' => '',
            'image' => ''
        ];

        //act
        $response = $this->post('/ask_register',$user);

        //assert
        $response->assertStatus(302)
                ->assertInvalid(['name','lastname','email','matricule','speciality','number','image']);
    }


}
