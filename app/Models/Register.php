<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'section_id',
        'name',
        'register_date',
        'enroll_date',
        'end_date',
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
}
