<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterAndSendMailToUser extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example_register_user()
    {
        $response = $this->post(route('register'),[
            'name' => 'Jksa Altingai osman ',
            'email' => 'jksa1@gmail.com',
            'password' => 'jksa1@gmail.com',
            'password-confirm' => 'jksa1@gmail.com'
        ]);
        $response->assertRedirect();
        // dd(User::all());
        // $this->assertDatabaseHas('users' , [
        //     'email' => 'jksa1@gmail.com'
        // ]);
    }
}
