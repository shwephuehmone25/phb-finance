<?php
namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getAllTransactions(Request $request)
    {
        $date = $request->query('created_at');

        $banks = BankAccount::get();

        $transactions = Transaction::query()
        ->when($date, function ($query, $date) {
            $query->whereDate('created_at', $date);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $bahtToMmkRate = \App\Models\CurrencyRate::where('from_currency', 'THB')
            ->where('to_currency', 'MMK')
            ->whereDate('effective_date', '<=', now())
            ->orderByDesc('effective_date')
            ->first();

        $mmkToBahtRate = \App\Models\CurrencyRate::where('from_currency', 'MMK')
            ->where('to_currency', 'THB')
            ->whereDate('effective_date', '<=', now())
            ->orderByDesc('effective_date')
            ->first();

        return view('user.transactions', compact('transactions', 'bahtToMmkRate', 'mmkToBahtRate', 'banks'));
    }

    public function index()
    {
        return view('admin.partials.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
