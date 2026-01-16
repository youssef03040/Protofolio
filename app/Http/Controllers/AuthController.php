<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Show the registration form for guests.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    /**
     * Handle a new registration request.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('status', 'Registratie ontvangen. Wacht op goedkeuring.');
    }

    /**
     * Show the login form for guests.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! $user->is_approved) {
            return back()->withErrors([
                'email' => 'Dit account is nog niet goedgekeurd.',
            ])->onlyInput('email');
        }

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Inloggen mislukt. Controleer je gegevens.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Log the current user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Show the profile dashboard for the authenticated user.
     */
    public function dashboard(Request $request)
    {
        return view('dashboard', ['user' => $request->user()]);
    }

    /**
     * Update profile data for the authenticated user.
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'portfolio_url' => ['nullable', 'url'],
            'role_title' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'url'],
            'github_url' => ['nullable', 'url'],
            'languages' => ['nullable', 'string'],
            'hobbies' => ['nullable', 'string'],
            'interests' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],
            'education' => ['nullable', 'string'],
            'work_experience' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
        ]);

        $request->user()->update($validated);

        return back()->with('status', 'Profiel bijgewerkt.');
    }
}
