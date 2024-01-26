<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payment';
    protected $fillable = [
        'voucher_no', 
        'total_amu', 
        'discount', 
        'balance', 
        'paid', 
        'status',
        'vou_date'
    ];


}
