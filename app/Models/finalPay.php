<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalPay extends Model
{
    use HasFactory;

    protected $table = 'final_pay';
   protected $fillable = [
        'vou_no',
        'f_paid',
        'vou_date'
   ];
}
