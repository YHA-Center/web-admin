<?php

namespace App\Models;

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
}
