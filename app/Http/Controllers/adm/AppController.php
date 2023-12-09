<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\AppRoute;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function route(): View
    {
        $routes  = AppRoute::get();
        return view('adm.route', ['routes' => $routes]);
    }
}
