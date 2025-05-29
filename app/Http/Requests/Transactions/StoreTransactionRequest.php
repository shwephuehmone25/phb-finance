<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'direction' => ['required', Rule::in(['BAHT_TO_MMK', 'MMK_TO_BAHT'])],
            'from_amount' => 'required|numeric|min:0',
            'transfer_bill' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_method' => [
                'required',
                Rule::in(['KBZPay', 'Wave Money', 'CB Pay', 'AYA Pay', 'PromptPay', 'TrueMoney Wallet', 'AirPay']),
            ],
            'receiver_bank_account_no' => 'required|string|max:255',
            'note' => 'nullable|string',
        ];
    }
}
