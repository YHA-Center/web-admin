<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\CourseSubjectInstructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'duration',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_models', 'course_id', 'subject_id');
    }
}
