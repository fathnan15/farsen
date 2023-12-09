<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile(): View
    {
        $profile = User::find(Auth::id());
        return view('user.profile', ['profile' => $profile]);
    }

    public function profileSetting(Request $request)
    {
        $profile = User::find(Auth::id());
        $gender = User::distinct()->pluck('gender');

        if ($request->isMethod('POST')) {
            $validate = $request->validate(
                [
                    'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                    'name' => ['required', 'min:6', Rule::unique('users', 'name')->ignore(auth()->id())],
                    'gender' => 'required',
                    'email' => ['required', 'email:rfc,dns', 'min:6', Rule::unique('users', 'email')->ignore(auth()->id()),],
                ]
            );
            if (!$request->has('avatar')) {
                $validate['name'] = Str::title($validate['name']);
                $profile->update($validate);
            } else {
                $avatar = $request->file('avatar');
                $avatarfilename = 'avatar' . Auth::id() . '.' . $avatar->getClientOriginalExtension();

                if (!Str::contains($profile->avatar, 'default')) {
                    Storage::delete(public_path('app/images/avatars/' . $avatarfilename));
                }

                Storage::putFileAs('images/avatars', $avatar, $avatarfilename);

                $validate['avatar'] = $avatarfilename;

                User::where('id', Auth::id())->update($validate);
            }

            session()->flash('success', 'Profile Details has been successfully updated!');
            return redirect()->route('profile');
        };

        return view('user.settingprofile', [
            'profile' => $profile,
            'gender' => $gender,
        ]);
    }

    public function accountSetting(Request $request)
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
