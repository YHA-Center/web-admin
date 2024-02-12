<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\CourseSubjectInstructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teaches', 'subject_id', 'teacher_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'class_models', 'subject_id', 'course_id');
    }
    
    public function classModels()
{
    return $this->hasMany(ClassModel::class, 'subject_id');

}
}