<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankAccountController extends Controller
{
    // Show list of bank accounts
    public function index()
    {
        $accounts = BankAccount::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.banks.index', compact('accounts'));
    }

    // Show form to create new bank account
    public function create()
    {
        $bankOptions = ['KBZPay', 'Wave Money', 'CB Pay', 'AYA Pay', 'PromptPay', 'TrueMoney Wallet', 'AirPay'];
        return view('admin.banks.create', compact('bankOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_account_name' => 'required|string|max:255',
            'account_number'    => 'nullable|string|max:50',
            'phone_number'      => 'nullable|string|max:20',
            'bank_name'         => 'required|in:KBZPay,Wave Money,CB Pay,AYA Pay,PromptPay,TrueMoney Wallet,AirPay',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        $data = $request->only(['bank_account_name', 'account_number', 'phone_number', 'bank_name']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path          = $request->file('image')->store('bank_images', 'public');
            $data['image'] = $path;
        }

        BankAccount::create($data);

        return redirect()->route('banks.index')
            ->with('success', 'Bank account created successfully.');
    }

    public function show(BankAccount $bankAccount)
    {
        return view('admin.banks.show', compact('bankAccount'));
    }

    public function edit(BankAccount $bankAccount)
    {
        $bankOptions = ['KBZPay', 'Wave Money', 'CB Pay', 'AYA Pay', 'PromptPay', 'TrueMoney Wallet', 'AirPay'];
        return view('admin.banks.edit', compact('bankAccount', 'bankOptions'));
    }

    public function update(Request $request, BankAccount $bankAccount)
    {
        $request->validate([
            'bank_account_name' => 'required|string|max:255',
            'account_number'    => 'nullable|string|max:50',
            'phone_number'      => 'nullable|string|max:20',
            'bank_name'         => 'required|in:KBZPay,Wave Money,CB Pay,AYA Pay,PromptPay,TrueMoney Wallet,AirPay',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['bank_account_name', 'account_number', 'phone_number', 'bank_name']);

        // Handle image upload & delete old image if exists
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($bankAccount->image && Storage::disk('public')->exists($bankAccount->image)) {
                Storage::disk('public')->delete($bankAccount->image);
            }
            $path          = $request->file('image')->store('bank_images', 'public');
            $data['image'] = $path;
        }

        $bankAccount->update($data);

        return redirect()->route('banks.index')
            ->with('success', 'Bank account updated successfully.');
    }

    public function destroy(BankAccount $bankAccount)
    {
        // Delete image from storage if exists
        if ($bankAccount->image && Storage::disk('public')->exists($bankAccount->image)) {
            Storage::disk('public')->delete($bankAccount->image);
        }

        $bankAccount->delete();

        return redirect()->route('banks.index')
            ->with('success', 'Bank account deleted successfully.');
    }
}
