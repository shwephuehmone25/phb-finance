<?php
namespace App\Http\Requests\Rates;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'from_currency'  => 'required|string|size:3|alpha|uppercase',
            'to_currency'    => 'required|string|size:3|alpha|different:from_currency|uppercase',
            'rate'           => 'required|numeric|min:0',
            'effective_date' => [
                'nullable',
                'date',
                Rule::unique('currency_rates')
                    ->where(function ($query) {
                        return $query->where('from_currency', $this->from_currency)
                            ->where('to_currency', $this->to_currency)
                            ->where('effective_date', $this->effective_date);
                    }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'from_currency.size'    => 'Currency code must be exactly 3 letters.',
            'to_currency.different' => 'From and To currencies must be different.',
            'effective_date.unique' => 'This currency rate for the given date already exists.',
        ];
    }
}
