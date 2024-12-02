<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $table = 'scheduling';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'clinic_id',
        'time',
        'reason_for_consultation'
    ];
}