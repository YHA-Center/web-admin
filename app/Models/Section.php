<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start',
        'end',
    ];

    public function courses(){
        return $this->belongsToMany(Course::class, 'section_id', 'course_id');
    }
}
