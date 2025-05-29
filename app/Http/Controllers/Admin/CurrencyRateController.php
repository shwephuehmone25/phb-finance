<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rates\CreateRateRequest;
use App\Http\Requests\Rates\UpdateRateRequest;
use App\Models\CurrencyRate;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CurrencyRateController extends Controller
{
    // List all rates
    public function index()
    {
        $currencyRates = CurrencyRate::orderBy('effective_date', 'desc')->paginate(5);
        return view('admin.rates.index', compact('currencyRates'));
    }

    // Show create form
    public function create()
    {
        return view('admin.rates.create');
    }

    // Store new rate
    public function store(CreateRateRequest $request)
    {
        try {
            CurrencyRate::create($request->validated());

            return redirect()->route('currency-rates.index')
                ->with('success', 'Currency rate created successfully.');
        } catch (QueryException $e) {
            // Log full error details
            Log::error('CurrencyRate creation failed.', [
                'message' => $e->getMessage(),
                'code'    => $e->getCode(),
                'trace'   => $e->getTraceAsString(),
                'data'    => $request->validated(),
            ]);

            // Handle unique constraint violation (SQLSTATE[23000])
            if ($e->getCode() === '23000') {
                return back()
                    ->withErrors(['from_currency' => 'This currency rate for the given date already exists.'])
                    ->withInput();
            }

            return back()
                ->withErrors(['error' => 'Database error: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // Show edit form
    public function edit(CurrencyRate $currencyRate)
    {
        return view('admin.rates.edit', compact('currencyRate'));
    }

    // Update rate
    public function update(UpdateRateRequest $request, CurrencyRate $currencyRate)
    {
        $currencyRate->update($request->validated());
        return redirect()->route('currency-rates.index')->with('success', 'Currency rate updated successfully.');
    }

    // Delete rate
    public function destroy(CurrencyRate $currencyRate)
    {
        $currencyRate->delete();
        return redirect()->route('currency-rates.index')->with('success', 'Currency rate deleted successfully.');
    }
}
