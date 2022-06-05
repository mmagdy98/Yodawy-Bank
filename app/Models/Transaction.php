<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'send_account_id',
        'receive_account_id',
        'account_number',
        'currency_id',
        'amount',
    ];

    public function Currency()
    {
        return $this->belongsTo(Currency::class);
    } 
    public function SendAccountRelation()
    {
        return $this->belongsTo(Account::class, 'id', 'send_account_id');
    }
    public function ReceiveAccountRelation()
    {
        return $this->belongsTo(Account::class, 'id', 'receive_account_id');
    } 
}
