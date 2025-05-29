<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    // Handle login logic
    public function loginTest(Request $request)
    {
        //dd($request);
        $request->validate([
            'phone_number' => 'required|string',
            'password'     => 'required|string',
        ]);

        $phone = Phone::where('phone_number', $request->phone_number)->first();

        if (! $phone || ! $phone->is_verified) {
            throw ValidationException::withMessages([
                'phone_number' => ['Phone number is not registered or verified.'],
            ]);
        }

        $user = User::where('phone_id', $phone->id)->first();

        if (! $user || ! Auth::attempt(['phone_id' => $phone->id, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'phone_number' => ['The provided credentials are incorrect.'],
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('get.transactions'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'password'     => 'required|string',
        ]);

        // Check if user exists with the given phone number
        $user = User::where('phone_number', $request->phone_number)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone_number' => ['The provided credentials are incorrect.'],
            ]);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(route('get.transactions'));
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
