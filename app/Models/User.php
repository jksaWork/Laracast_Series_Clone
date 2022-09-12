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
        // return Redis::smembers();
        $value = Redis::smembers("user:{$this->id}::series:{$series->id}");
        return count($value);
    }
}
