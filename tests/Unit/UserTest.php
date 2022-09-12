<?php

namespace Tests\Unit;

use App\Models\Lesson;
use App\Models\Series;
use App\Models\User;
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
        $lesson = Lesson::factory()->create(
            ['series_id' => $series->id]
        );

        $user->completLesson($lesson);
        $value = $user->getSeriesCompletedPresage($series);
        $this->assertEquals($value, 50);
    }
}
