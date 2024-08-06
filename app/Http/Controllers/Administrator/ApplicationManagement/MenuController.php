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
        // $m = UserMenu::find(1);
        // $sm = $m->subMenu;
        // dd($sm);
        return view('adm.menu.index', ['menus' => $menus]);
        // dd('test menu controller');

    }

    public function menuDetail()
    {
    }
}
