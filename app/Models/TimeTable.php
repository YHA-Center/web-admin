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
        'student_id',
        'teacher_id',
        'assistant_id',
        'date',
        'description',
    ];
}
