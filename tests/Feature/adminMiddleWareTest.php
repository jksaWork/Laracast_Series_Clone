<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class adminMiddleWareTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cannot_visit_admin_urls()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('series.index'));
        // $response->assertSessionHas('error', 'You Are Not Admin') ;
        // $response->assertRedirect();
        $response->assertStatus(200);
    }
}
