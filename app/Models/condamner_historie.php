<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class condamner_historie extends Model
{
    use HasFactory;
    protected $fillable = [
        'condamner_id',
        'situation',
        'date_situation',
        'status',
        'date_status',
        'observation',
        'date_observation',
    ];
}
