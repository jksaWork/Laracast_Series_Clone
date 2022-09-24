<?php

namespace Tests\Unit;

use App\Models\Lesson;
use App\Models\Series;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_can_compleated_the_lesson()
    {
        $this->flashRedis();

        $user = User::factory()->create();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $user->completLesson($lesson);

        $value = Redis::smembers("user:{$user->id}::series:{$series->id}");
        // dd($value, "user:{$user->id}::series:{$series->id}");
        $this->assertEquals($value, [$lesson->id]);
    }

    public function test_user_can_compleated_tow_lesson_for_same_series_the_lesson()
    {
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $user->completLesson($lesson);

        $user->completLesson($lesson2);

        $value = Redis::smembers("user:{$user->id}::series:{$series->id}");
        // dd($value, "user:{$user->id}::series:{$series->id}");
        $this->assertEquals($value, [$lesson->id , $lesson2->id]);
    }


    public function test_get_what_the_lesson_complete_in_Series(){

        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id]
        );

        $user->completLesson($lesson);
        $value = $user->getSeriesCompletedPresage($series);
        $this->assertEquals($value, 50);
    }

    public function test_a_user_has_start_a_series_or_not(){
        $this->withoutExceptionHandling();
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $series2 = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series2->id]
        );

        $user->completLesson($lesson);
        // assertions Setions
        $this->assertTrue($user->hasSatredSeries($series));
        $this->assertFalse($user->hasSatredSeries($series2));

    }

    public function test_check_if_user_can_get_complete_lesson_from_a_series(){
        // $this->assertTrue(true);
        $this->withoutExceptionHandling();
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id]
        );

        $user->completLesson($lesson);
        $user->completLesson($lesson2);
        // get Completed Lesson From Spesfic Series
        $CompletedLessonFromSeries = $user->getCompletedLessonFromSeries($series);
        $this->assertInstanceOf(Collection::class, $CompletedLessonFromSeries);
        $this->assertInstanceOf(Lesson::class, $CompletedLessonFromSeries->random());
        $ids = $CompletedLessonFromSeries->pluck('id')->all();

        // assert If Lesson Ids Exist IN Collections
        $this->assertTrue(in_array($lesson->id,  $ids));
        $this->assertTrue(in_array($lesson2->id,  $ids));
        $this->assertTrue(in_array($lesson->id,  $ids));

    }
    public function test_user_can_get_a_completed_lesson(){

        $this->withoutExceptionHandling();
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series->id]
        );

        $lesson3 = Lesson::factory()->create(
            ['series_id' => $series->id]
        );

        $user->completLesson($lesson);
        $user->completLesson($lesson2);

        $this->assertTrue($user->hasCompleatedLesson($lesson));
        $this->assertTrue($user->hasCompleatedLesson($lesson2));
        $this->assertFalse($user->hasCompleatedLesson($lesson3));
    }

    public function test_if_user_can_get_list_of_series_he_was_watched(){
        // $this->getSeriesWasWatched
        $this->withoutExceptionHandling();
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $series2 = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series2->id]
        );

        $user->completLesson($lesson);
        $user->completLesson($lesson2);

        $WatchedSeries = $user->getSeriesWasWatched();
        $this->assertInstanceOf(Collection::class, $WatchedSeries);
        $this->assertTrue($WatchedSeries->count() == 2);
        $this->assertTrue(in_array($WatchedSeries->random()->id  , [$series->id, $series2->id]));
    }

    public function test_user_can_get_count_of_lesson_completed(){
        $this->withoutExceptionHandling();
        $this->flashRedis();
        $user = User::factory()->create();
        $series = Series::factory()->create();
        $series2 = Series::factory()->create();
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );
        $lesson2 = Lesson::factory()->create(
            ['series_id' => $series2->id]
        );
        $user->completLesson($lesson);
        $user->completLesson($lesson2);
        $count = $user->getCountCompleteLesson();
        // dd($count);
        $this->assertTrue($count == 2);
    }

}
