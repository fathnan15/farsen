<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\AppRoute;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AppController extends Controller
{
    public function route(Request $request)
    {
        if ($request->isMethod('POST')) {
            // dd($request);
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('app_routes')->where(function ($query) use ($request) {
                        return $query->where('http_req', $request->http_req)
                            ->where('name', $request->name);
                    }),
                ],
            ], ['name', 'The combination of HTTP request :value and name must be unique.']);
            $default_input = [
                'created_by' => Auth::id(),
                'created_at' => now('Asia/Jakarta')
            ];
            $input = array_merge($default_input, $request->input());
            // array_merge($request->input(), );
            // dd($input);
            AppRoute::create($input);


            session()->flash('success', 'New Route has been successfully added!');
            return redirect()->route('app.route');
        }

        $routes  = AppRoute::orderBy('name')->get();
        return view('adm.route', ['routes' => $routes]);
    }

    public function routeDetails($id)
    {
        dd($id);
    }
}
