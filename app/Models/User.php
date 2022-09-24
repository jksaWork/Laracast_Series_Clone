<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'account_verfied',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function IsAdmin(){
        return in_array($this->email,
        [
            'admin@gmail.com',
            'admin1@gmail.com'
        ]);
    }

    public function completLesson(Lesson $lesson){
        Redis::sadd("user:{$this->id}::series:{$lesson->Series->id}",[$lesson->id] );
    }
    /**
     * to get The Presatage
     * @param \App\Mdoels\Series $series;
     */
    public function getSeriesCompletedPresage(Series $series){
        $seriesLessonCount =  $series->Lessons->count();
        $completedLesson = $this->getSeriesCompleateLesson($series);
        return ($completedLesson / $seriesLessonCount) *100;
    }


     /**
     * to get The series Compleate Lesson
     * @param \App\Mdoels\Series $series;
     */
    public function getSeriesCompleateLesson(Series $series){
        $value = Redis::smembers("user:{$this->id}::series:{$series->id}");
        return count($value);
    }

    public function hasSatredSeries(Series $series){
        return count(Redis::smembers("user:{$this->id}::series:{$series->id}")) > 0;
    }
    public function getCompletedLessonFromSeriesWithRedis(Series $series){
        return Redis::smembers("user:{$this->id}::series:{$series->id}");
    }

    public function getCompletedLessonFromSeries(Series $series){
        $ids = $this->getCompletedLessonFromSeriesWithRedis($series);
        // dd(in_array(2 , [2,1]));
        return collect(Lesson::find($ids));

    }

    public function hasCompleatedLesson(Lesson $lesson){
        return in_array(
            $lesson->id,
            $this->getCompletedLessonFromSeriesWithRedis($lesson->Series),
        );
    }


    public function getSeriesWasWatched(){
        $keyes = Redis::keys("user:{$this->id}::series:*");
        $ids  = [];
        foreach ($keyes as $value) :
            $id = explode(':' , $value)[4];
            array_push($ids, $id);
        endforeach;
        return collect(Series::find($ids));
    }

    public function getCountCompleteLesson(){
        $keys = (Redis::keys("user:{$this->id}::series:*"));
        $lesson_count = 0;
        foreach ($keys  as $value) :
            $key = explode('_', $value)[2];
            $lesson_count = $lesson_count + count(Redis::smembers($key));
        endforeach;
        return $lesson_count;
    }
}
