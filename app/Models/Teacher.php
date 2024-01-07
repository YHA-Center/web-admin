<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Position;
use App\Models\CourseSubjectInstructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'position_id',
        'image',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teaches', 'teacher_id', 'subject_id');
    }
}
