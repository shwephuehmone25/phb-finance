<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'transfer_bill',
        'payment_method',
        'receiver_bank_account_no',
        'note',
        'direction',
        'from_amount',
        'to_amount',
        'exchange_rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
