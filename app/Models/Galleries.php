<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    public $timestamps = true;

    protected $fillable = [
        'type_provider',
        'url_image',
        'hora_fim',
        'type_media',
        'provider_id'
    ];
}