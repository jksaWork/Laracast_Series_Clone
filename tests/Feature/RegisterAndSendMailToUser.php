<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterAndSendMailToUser extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example_register_user()
    {
        $response = $this->post([
            'name' => 'Jksa Altingai osman ',
            'emial' => 'jksa1@gmail.com',
            'password' => 'jksa1@gmail.com',
            'password-confirm' => 'jksa1@gmail.com'
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('user' , [
            'email' => 'jksa1@gmail.com'
        ]);
    }
}
