<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateLessonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_create_lesson_by_series_id()
    {
        $serirs = \App\Models\Series::factory()->create();
        $response = $this->postJson('admin/' . $serirs->id . '/lessons', [
                "title" => 'Lesson number 1',
                "vedio_id" => '12312',
                "episode_number" => '123',
                "description" => 'Lesson number 1',
        ]);
        // $response->status(200)
        $response->assertStatus(200);
        // database Has Filed
        $this->assertDatabaseHas('lessons' , [
            'title' => 'Lesson number 1',
        ]);
    }

    public function test_Admin_also_create_lesson_by_series_id(){
        $this->assertTrue(true);
    }
}
