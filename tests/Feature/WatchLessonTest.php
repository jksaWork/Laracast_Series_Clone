<?php

namespace Tests\Feature;

use App\Models\Lesson;
use App\Models\Series;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

use function PHPUnit\Framework\assertInstanceOf;

class WatchLessonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_lesson_can_geted_ordered_with_eposide_number()
    {
        $this->withoutExceptionHandling();
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id,'episode_number' => 201]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id, 'episode_number' => 200]
        );
        $lessons = $series->getLessonOrderByEpesdeo();
        $this->assertInstanceOf(Collection::class, $lessons);
        $this->assertEquals($lessons[1]->id , $lesson->id);
        $this->assertEquals($lessons[0]->id , $lesson2->id);
    }

}
