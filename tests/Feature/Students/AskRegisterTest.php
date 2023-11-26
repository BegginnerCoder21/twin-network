<?php

namespace Tests\Feature\Students;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AskRegisterTest extends TestCase
{
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


}
