<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    protected $fillable = [
        'from_currency',
        'to_currency',
        'rate',
        'effective_date',
    ];

    public function setFromCurrencyAttribute($value)
    {
        $this->attributes['from_currency'] = strtoupper($value);
    }

    public function setToCurrencyAttribute($value)
    {
        $this->attributes['to_currency'] = strtoupper($value);
    }
}
