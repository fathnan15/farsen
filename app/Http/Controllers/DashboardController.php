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
      $menus = Users::find(Auth::id())->menus;
      // echo '<pre>';
      // var_dump($menu);
      // echo '</pre>';
      // die;
      return view('dashboard',['menus' => $menus]);
    }
}
