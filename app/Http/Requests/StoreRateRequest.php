<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // You can customize with policy if needed
        return true;
    }

    public function rules()
    {
        return [
            'from_currency'   => 'required|string|size:3|alpha|uppercase',
            'to_currency'     => 'required|string|size:3|alpha|different:from_currency|uppercase',
            'rate'            => 'required|numeric|min:0',
            'effective_date'  => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'from_currency.size' => 'Currency code must be exactly 3 letters.',
            'to_currency.different' => 'From and To currencies must be different.',
        ];
    }
}
