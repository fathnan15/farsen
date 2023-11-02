<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UsersAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
      $menu = Users::find(Auth::id())->menus->pluck('menu_nm');
      dd($menu);

    }
}
