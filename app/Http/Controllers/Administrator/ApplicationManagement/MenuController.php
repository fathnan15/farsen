<?php

namespace App\Http\Controllers\Administrator\ApplicationManagement;

use App\Http\Controllers\Controller;
use App\Models\UserMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu(Request $request)
    {
        $menus = UserMenu::orderBy('menu_nm')->get();
        return view('adm.menu.index', ['menus' => $menus]);
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
