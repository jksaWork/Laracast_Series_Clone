<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Series(){
        return $this->belongsTo(Series::class);
    }

    public function getNext(){
        return $this->Series->Lessons()->where('episode_number','>' , $this->episode_number)->orderBy('episode_number' , 'asc')->first();
    }

    public function hasNext(){
        return $this->Series->Lessons()->where('episode_number','>' , $this->episode_number)->orderBy('episode_number' , 'asc')->first() != null;
    }

    public function getPrevious(){
        return $this->Series->Lessons()->where('episode_number','<' , $this->episode_number)->orderBy('episode_number' , 'desc')->first();
    }

    public function hasPrevious(){
        return $this->Series->Lessons()->where('episode_number','<' , $this->episode_number)->orderBy('episode_number' , 'desc')->first() != null;
    }
}
