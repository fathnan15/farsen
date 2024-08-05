<?php

namespace App\Http\Controllers\Administrator\ApplicationManagement;

use App\Http\Controllers\Controller;
use App\Models\UserMenu;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class MenuController extends Controller
{
    public function menu(Request $request)
    {
        $menus = UserMenu::orderBy('menu_nm')->get();
        return view('adm.menu.index', ['menus' => $menus]);
        // dd('test menu controller');

    }
}
