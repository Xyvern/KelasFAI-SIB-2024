<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withInput()->with('error', 'Passwords do not match.');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Log the user in
        // \Auth::login($user);

        // Redirect to a specific route
        return redirect()->route('login')->with('success', 'Registration successful.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            // dd(Auth::user()->role === 1);
            if (Auth::user()->role === 0) {
                return redirect()->intended('barang');
            } elseif (Auth::user()->role === 1) {
                return redirect()->intended('customer');
            }
        }
        
        return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
