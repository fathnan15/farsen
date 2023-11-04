<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMenu;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
      return view('dashboard');
    }
}
