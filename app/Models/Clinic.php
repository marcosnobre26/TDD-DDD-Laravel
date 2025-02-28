<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinic';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'user_id',
        'fantasy_name',
        'cnpj',
        'address',
        'description'
    ];
}