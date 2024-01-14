<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'course_id',
        'subject_id',
        'teacher_id',
        'assistant_id',
        'date',
        'description',
    ];

    public function Courses(){
        return $this->belongsTo('App\Models\Course');
    }

    public function Subject(){
        return $this->belongsTo('App\Models\Subject');
    }

    public function Sections(){
        return $this->belongsTo('App\Models\Section');
    }
}
