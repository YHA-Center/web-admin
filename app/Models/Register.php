<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 
        'section_id',
        'name',
        'register_date',
        'enroll_date',
        'father_name',
        'mother_name',
        'phone',
        'email',
        'city',
        'township',
        'date_of_birth', 
        'nrc',
        'gender',
        'image',
        'education',
        'status',
    ];

    public function Courses(){
        $this->belongsTo('App\Models\Course');
    }
}
