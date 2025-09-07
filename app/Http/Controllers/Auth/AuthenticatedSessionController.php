<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Add this line for using Hash facade

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Manual validation
        if (empty($request->email)) {
            return back()->withErrors(['email' => 'L\'adresse e-mail est requise.']);
        }

        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                Rule::exists(User::class), 
            ],
            'password' => [
                'required',
                'string',
                'min:8', 
            ],
        ], [
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail doit être une adresse e-mail valide.',
            'email.exists' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed
            $user = Auth::user();

            // Verify password
            if (Hash::check($request->password, $user->password)) {
                // Password is correct
                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                // Password is incorrect
                Auth::logout();
                return back()->withErrors(['password' => 'Le mot de passe est incorrect.']);
            }
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'L\'adresse e-mail ou le mot de passe est incorrect.']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
