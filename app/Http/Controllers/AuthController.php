<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    protected $user_model;

    public function __construct()
    {
        $this->user_model = new User;
    }
    
    
    /**
     * Handle login view.
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {


        $credentials = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ]
            );

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                // Auth::login();
                return redirect()->intended('dasboard');
            }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
