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
        return $this->belongsTo(User::class);
    }
    public function Currency()
    {
        return $this->belongsTo(Currency::class);
    } 
    public function SendAccountRelations()
    {
        return $this->hasMany(Transaction::class, 'send_account_id', 'id');
    }
    public function ReceiveAccountRelations()
    {
        return $this->hasMany(Transaction::class, 'receive_account_id', 'id');
    } 
}
