<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    //relation one to many with user
    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function cuurency()
    {
        return $this->belongsto(Curency::class);
    }
}
