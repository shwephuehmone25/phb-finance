<?php
namespace App\Http\Controllers;

use App\Http\Requests\Transactions\StoreTransactionRequest;
use App\Models\CurrencyRate;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Transactions\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->query('created_at');

       $transactions = Transaction::query()

       ->when($date, function ($query, $date) {
            $query->whereDate('created_at', $date);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('user.transactions.create');
    }

    public function store(StoreTransactionRequest $request)
    {
        $data            = $request->validated();
        $data['user_id'] = Auth::id();

        if ($data['direction'] === 'BAHT_TO_MMK') {
            $fromCurrency = 'THB';
            $toCurrency   = 'MMK';
        } elseif ($data['direction'] === 'MMK_TO_BAHT') {
            $fromCurrency = 'MMK';
            $toCurrency   = 'THB';
        } else {
            return back()->withErrors('Invalid direction selected.');
        }

        $rateRecord = CurrencyRate::where('from_currency', $fromCurrency)
            ->where('to_currency', $toCurrency)
            ->where('effective_date', '<=', now()->toDateString())
            ->orderBy('effective_date', 'desc')
            ->first();

        if (! $rateRecord) {
            return back()->withErrors('Exchange rate not found for the selected currency pair.');
        }

        $data['exchange_rate'] = $rateRecord->rate;
        $data['to_amount']     = $data['from_amount'] * $data['exchange_rate'];
        $data['amount']        = $data['to_amount'];

        if ($request->hasFile('transfer_bill')) {
            $data['transfer_bill'] = $request->file('transfer_bill')->store('transfer_bills', 'public');
        }

        Transaction::create($data);

        return redirect()->route('get.transactions')->with('success', 'Transaction created successfully!');
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transactions.edit', compact('transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->status = $request->input('status');
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction status updated successfully.');
    }
}
