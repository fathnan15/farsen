<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $user_model;

    public function __construct()
    {
        $this->user_model = new Users;
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
                return redirect()->intended('/dashboard');
            }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
