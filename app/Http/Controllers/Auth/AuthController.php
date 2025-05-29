<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Display registration form
    public function showRegisterForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'nrc'          => 'required|string|max:50|unique:users,nrc',
            'country'      => 'required|string|max:100',
            'city'         => 'required|string|max:100',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'password'     => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name'         => $request->name,
            'nrc'          => $request->nrc,
            'country'      => $request->country,
            'city'         => $request->city,
            'phone_number' => $request->phone_number,
            'password'     => Hash::make($request->password),
            'is_verified'  => false,
            'role'         => 'User',
        ]);

        Auth::login($user);

        return redirect()->route('get.transactions')->with('success', 'Registration successful!');
    }

    // Handle registration logic
    public function registerWithPhone(Request $request)
    {
        // Validation
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|unique:admins|regex:/^\+?[1-9]\d{1,14}$/',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Create a new admin record
        $admin = User::create([
            'name'              => $request->name,
            'phone'             => $request->phone,
            'password'          => Hash::make($request->password),
            'role'              => 'Admin',
            'verification_code' => $otp,
            'is_verified'       => false,
        ]);

        return redirect()->route('admin.verify')->with('success', 'OTP sent. Please verify your phone.');
    }

    // Display OTP verification form
    public function showOtpForm()
    {
        return view('user.auth.verify-otp');
    }

    public function showOtpRequestForm()
    {
        return view('user.auth.request-otp');
    }

    public function requestOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code' => ['required', 'in:+959,+66,+856'],
            'phone_number' => ['required', 'digits_between:7,12'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $countryCode = $request->input('country_code');
        $phoneNumber = $request->input('phone_number');
        $fullPhone   = $countryCode . $phoneNumber;

        $existingPhone = Phone::where('phone_number', $fullPhone)->first();

        if ($existingPhone) {
            if ($existingPhone->is_verified && $existingPhone->is_registered) {
                return redirect()->back()->with('error', 'This phone number is already in use by a user!');
            } else {
                $existingPhone->update([
                    'is_verified' => false,
                ]);
            }
        } else {
            $existingPhone = Phone::create([
                'phone_number' => $fullPhone,
                'country_code' => $countryCode,
                'is_verified'  => false,
            ]);
        }

        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $existingOtp = Otp::updateOrCreate(
            ['phone_id' => $existingPhone->id],
            ['otp' => $otp, 'expired_at' => now()->addSeconds(180)]
        );

        try {
            $this->sendOtpNotification($existingPhone, $otp, $fullPhone);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Failed to send OTP. Please try again.');
        }

        return redirect()->route('otp.verify')->with([
            'message'      => 'OTP sent successfully!',
            'phone_id'     => $existingPhone->id,
            'phone_number' => $fullPhone,
            'expired_at'   => $existingOtp->expired_at,
        ]);
    }

    private function sendOtpNotification($phone, $otp, $fullPhoneNumber)
    {
        //$phone->notify(new SendOtp($otp, $fullPhoneNumber));
    }

    // Display login form
    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    // Handle login logic
    public function LoginAsAdmin(Request $request)
    {
        // Validation
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logoutAsAdmin()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
