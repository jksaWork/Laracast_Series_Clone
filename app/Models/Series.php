<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageUrlAttribute($key){
        return asset('storage/' .$key);
    }

    // Relations
    public function Lessons(){
        return $this->hasMany(Lesson::class);
    }
    public function getLessonOrderByEpesdeo(){
        return $this->Lessons()->orderBy('episode_number' , 'asc')->get();
    }

}

