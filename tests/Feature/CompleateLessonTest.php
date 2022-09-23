<?php

namespace Tests\Feature;

use App\Models\Lesson;
use App\Models\Series;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompleateLessonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_un_authtecated_user_can_not_complete_lesson()
    {
        $Series = Series::factory()->create();

        $lesson = Lesson::factory()->create([
            'series_id' => $Series->id,
        ]);

        $response = $this->get("/complete-lesson/{$lesson->id}");
        $response->assertRedirect();
    }

    public function test_authuntecated_user_can_compleate_lesson(){
        $Series = Series::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);
        $lesson = Lesson::factory()->create([
            'series_id' => $Series->id,
        ]);

        $response = $this->get("/complete-lesson/{$lesson->id}");
        // dd($response);
        $response->assertStatus(200);
        $this->assertTrue(
            in_array(
                $lesson->id,
                $user->getCompletedLessonFromSeriesWithRedis($lesson->Series)
            )
            );
    }
}
