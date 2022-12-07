<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_beranda()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_response_register()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }



    public function test_register()
    {
        $response = $this->post('/register', [
            'name' => 'coba2',
            'email' => 'coba2@g.ci',
            'password' => 'coba12345',
            'password_confirmation' => 'coba12345',
        ]);
        $response->assertRedirect('/home');
    }
    
}
