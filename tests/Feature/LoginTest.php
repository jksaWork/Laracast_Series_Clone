<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Login_With_In_Valid_Credintails_example()
    {
        // $response = $this->get('/');
        $user = \App\Models\User::factory()->create();
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => "worng Password" ,
        ]);
        $response->assertStatus(422);
        $response->assertSee("In Valid Data");
    }


    public function test_Login_With_Valid_Credintails_example(){
        $password = bcrypt('123456');
        $user = User::factory()->create([
            'password' => $password,
        ]);
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => "123456",
        ]);
        $response->assertStatus(200);
    }

    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
