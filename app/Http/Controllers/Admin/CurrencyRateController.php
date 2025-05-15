<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Models\CurrencyRate;

class CurrencyRateController extends Controller
{
    // List all rates
    public function index()
    {
        $currencyRates = CurrencyRate::orderBy('effective_date', 'desc')->get();
        return view('admin.rate.index', compact('currencyRates'));
    }

    // Show create form
    public function create()
    {
        return view('rate.create');
    }

    // Store new rate
    public function store(StoreRateRequest $request)
    {
        CurrencyRate::create($request->validated());
        return redirect()->route('currency-rates.index')->with('success', 'Currency rate created successfully.');
    }

    // Show edit form
    public function edit(CurrencyRate $currencyRate)
    {
        return view('rate.edit', compact('currencyRate'));
    }

    // Update rate
    public function update(UpdateRateRequest $request, CurrencyRate $currencyRate)
    {
        $currencyRate->update($request->validated());
        return redirect()->route('rate.index')->with('success', 'Currency rate updated successfully.');
    }

    // Delete rate
    public function destroy(CurrencyRate $currencyRate)
    {
        $currencyRate->delete();
        return redirect()->route('rate.index')->with('success', 'Currency rate deleted successfully.');
    }
}
