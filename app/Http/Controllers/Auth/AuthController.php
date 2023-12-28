<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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

        // Create Session Login & Redirect to dashboard
        # Check credentials user
        if (Auth::attempt($credentials)) {
            # Generate session & create token
            $request->session()->regenerate();
            # Redirect with authentication
            return redirect()->intended(route('dashboard.index'));
        }

        // Back with error.
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    //? Logout Logic
    public function logout(Request $request) {
        // Logout
        Auth::logout();
        // Delete all session
        $request->session()->invalidate();
        // Regenerate new token
        $request->session()->regenerateToken();
        return redirect(route('main.index'));
    }
}
