<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable = [
        'voucher_no', 
        'stu_name', 
        'course_id', 
        'enroll_date', 
        'fees', 
        'vou_date'
    ];
}
