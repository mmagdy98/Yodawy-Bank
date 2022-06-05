<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'rate'
    ];

}
