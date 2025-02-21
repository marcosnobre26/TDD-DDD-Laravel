<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'service';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'price',
        'type_provider',
        'provider_id'
    ];
}