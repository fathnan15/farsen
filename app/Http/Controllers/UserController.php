<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile(): View
    {
        $profile = User::find(Auth::id());
        return view('user.profile', ['profile' => $profile]);
    }

    public function profileSetting(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate = $request->validate(
                [
                    'avatar' => 'nullable|image|file|max:1024|mimes:png, jpg, jpeg',
                    'name' => 'required|unique:users,name|min:6',
                    'gender' => 'required',
                    'email' => ['required', 'email:rfc,dns', 'min:6', Rule::unique('users', 'email')->ignore(auth()->id()),],
                ]
            );
            User::where('id', Auth::id())->update($validate);
        };
        $profile = User::find(Auth::id());
        $gender = User::distinct()->pluck('gender');
        return view('user.settingprofile', [
            'profile' => $profile,
            'gender' => $gender,
        ]);
    }
}
