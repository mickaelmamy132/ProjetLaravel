<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prevenus extends Model
{
    use HasFactory;
    protected $table = 'prevenuses';
    protected $fillable = ['photo'];
}
