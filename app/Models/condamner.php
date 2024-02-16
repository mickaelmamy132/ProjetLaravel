<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class condamner extends Model
{
    use HasFactory;
    protected $table = 'condamners';
    protected $fillable = ['photo','unite_peine','unite_remise_peine'];
}
