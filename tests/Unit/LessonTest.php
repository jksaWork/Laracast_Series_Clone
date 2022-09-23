<?php

namespace Tests\Unit;

use App\Models\Lesson;
use App\Models\Series;
use Illuminate\Support\Collection;
use PhpParser\ErrorHandler\Collecting;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class LessonTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_if_can_get_previoesly_lesson_and_and_next_lesson()
    {

        $this->withoutExceptionHandling();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id, 'episode_number' => 2]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id , 'episode_number' => 3]
        );
        $lesson3 = Lesson::factory()->create(
            ['series_id' => $series->id , 'episode_number' => 4]
        );
        // assertion The Lessons Has Next or Note
        $lesson4 = $lesson->getNext();
        $this->assertInstanceOf(Lesson::class,$lesson4);
        $this->assertEquals($lesson4->id, $lesson2->id);
        $this->assertEquals($lesson2->getPrevious()->id, $lesson->id);
        $this->assertEquals($lesson3->getPrevious()->id, $lesson2->id);
    }

    public function test_check_if_lesson_has_next_and_prevois_lesson(){

        $this->withoutExceptionHandling();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id, 'episode_number' => 2]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id , 'episode_number' => 3]
        );
        $this->assertTrue($lesson->hasNext());
        $this->assertFalse($lesson->hasPrevious());
        $this->assertFalse($lesson2->hasNext());
        $this->assertTrue($lesson2->hasPrevious());
    }
}
