<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $table = 'professionals';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'speciality',
        'professional_register',
        'verification_status',
        'description'
    ];
}