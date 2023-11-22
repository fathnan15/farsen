<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function profile()
    {
        $profile = User::find(Auth::id());
        return view('user.profile', ['profile' => $profile]);
    }

    public function accountSetting(User $user)
    {
        if (request()->isMethod('POST')) {
            $validate = request()->validate([
                'old_password' => ['required'],
                'new_password' => ['required', 'confirmed', Password::min(6)],
            ]);

            if (!Hash::check(request('old_password'), auth()->user()->password)) {
                return back()->withErrors([
                    'old_password' => ['The old password does not match our records.']
                ]);
            }
            User::find(Auth::id())->update(['password' => Hash::make(request('new_password'))]);
            session()->flash('success', 'Password has been changed! Please relogin use the new password');
            return redirect()->route('account.setting');
        };
        return view('user.account_setting');
    }
}
