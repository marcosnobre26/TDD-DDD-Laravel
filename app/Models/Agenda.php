<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'data',
        'hora_inicio',
        'hora_fim',
        'status',
        'service_id'
    ];
}