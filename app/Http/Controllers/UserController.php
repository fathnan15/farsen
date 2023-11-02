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
        // $user = $this->user_model->where('username',$request->username)->first();


        // if($user && password_verify($request->password,$user->password))
        // {
        //     // dd($user->username);?
        //     Auth::login($user,false);
        //     // dd();
        //     $request->session()->regenerate();
        //     return redirect()->intended('dashboard');
        // }

        // $credentials = $request->validate(
        //     [
        //         'username' => ['required'],
        //         'password' => ['required']
        //     ]
        //     );

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
            
        if (Auth::attempt($credentials)) {
            dd('oke');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
