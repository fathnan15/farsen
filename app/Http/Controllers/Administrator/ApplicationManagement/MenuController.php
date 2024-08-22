<?php

namespace App\Http\Controllers\Administrator\ApplicationManagement;

use App\Http\Controllers\Controller;
use App\Models\UserMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function menu(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'menu_nm' => 'required|unique:user_menus,menu_nm|max:32',
            ]);

            $input = array_merge([
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'created_at' => now('Asia/Jakarta')
            ], $request->all());
            UserMenu::create($input);

            session()->flash('success', 'New Menu has been successfully added!');
            return redirect()->route('app.menu');
        }

        $menus = UserMenu::orderBy('menu_nm')->get();
        return view(
            'adm.menu.index',
            [
                'method_path' => base64_decode($request->input('path')),
                'menus' => $menus
            ]
        );
    }

    public function getDetails($id)
    {
        $menu = UserMenu::with(['subMenu' => function ($query) {
            $query->whereNull('relate_id')
                ->with('children');
        }])->findOrFail($id);
        return response()->json($menu);
    }
}
