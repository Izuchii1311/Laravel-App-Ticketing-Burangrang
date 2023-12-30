<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //? View Login
    public function index() {
        // Showing View Login
        return view('auth.login');
    }


    //? Login Logic Authentication
    public function authenticate(Request $request) {
        // Check Validation
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // Try Catch
        try {
            // Create Session Login & Redirect to dashboard
            # Check credentials user
            if (Auth::attempt($credentials)) {
                # Genersate session & create token
                $request->session()->regenerate();
                # Redirect with authentication
                return redirect()->intended(route('dashboard.index'));
            }

            // Back with error.
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Error login : ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
            ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    //? Logout Logic
    public function logout(Request $request) {
        // Try Catch
        try {
            # Logout
            Auth::logout();
            # Delete all session
            $request->session()->invalidate();
            # Regenerate new token
            $request->session()->regenerateToken();
            return redirect(route('main.index'));
        } catch (Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Logout Error : ' .  $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
            ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }
}
