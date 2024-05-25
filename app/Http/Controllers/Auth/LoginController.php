<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('student_number', 'password');

        // Check if the student number exists in the database
        $user = User::where('student_number', $credentials['student_number'])->first();

        if (!$user) {
            // Student number does not exist
            return back()->withErrors(['student_number' => 'Account does not exist.'])->withInput($request->only('student_number'));
        }

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/home');
        }

        // Authentication failed
        return back()->withErrors(['student_number' => 'These credentials do not match our records.'])->withInput($request->only('student_number'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('register');
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect('/home'); 
}


}
