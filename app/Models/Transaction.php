<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function sendAccountRelation()
    {
        return $this->belongsTo(Account::class, 'foreign_key', 'send_account_id');
    } 

    public function receiveAccountRelation()
    {
        return $this->belongsTo(Account::class, 'foreign_key', 'receive_account_id');
    } 

    public function Currency()
    {
        return $this->belongsTo(Currency::class, 'foreign_key', 'currency_id');
    } 


}
