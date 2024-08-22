<?php

namespace App\Http\Controllers\Administrator\ApplicationManagement;

use App\Http\Controllers\Controller;
use App\Models\AppRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RouteController extends Controller
{
    public function route(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('app_routes')->where(function ($query) use ($request) {
                        return $query->where('http_req', $request->http_req)
                            ->where('name', $request->name);
                    }),
                ],
            ], ['name' => 'The combination of HTTP request method and route name must be unique.']);

            $input = array_merge([
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'created_at' => now('Asia/Jakarta')
            ], $request->all());

            AppRoute::create($input);

            session()->flash('success', 'New Route has been successfully added!');
            return redirect()->route('app.route');
        }

        $routes = AppRoute::orderBy('name')->get();
        return view(
            'adm.route.index',
            [
                'method_path' => base64_decode($request->input('path')),
                'routes' => $routes,
            ]
        );
    }

    public function updateRoute(Request $request)
    {
        if ($request->has('is_active')) {
            $request->validate([
                'id' => 'required|exists:app_routes,id',
                'is_active' => 'required|boolean',
            ]);

            $route = AppRoute::find($request->id);
            $route->is_active = $request->is_active;
            $route->updated_by = Auth::id();
            $route->save();

            return response()->json(['success' => true, 'message' => 'Route status updated successfully.']);
        }

        if ($request->has('is_auth')) {
            $request->validate([
                'id' => 'required|exists:app_routes,id',
                'is_auth' => 'required|boolean',
            ]);

            $route = AppRoute::find($request->id);
            $route->is_auth = $request->is_auth;
            $route->updated_by = Auth::id();
            $route->save();

            return response()->json(['success' => true, 'message' => 'Route middleware updated successfully.']);
        }

        $request->validate([
            'id' => 'required|exists:app_routes,id',
            'name' => 'required|string|max:255',
            'http_req' => 'required|string|in:get,post',
            'uri' => 'required|string|max:255',
            'controller' => 'required|string|max:255',
            'action' => 'required|string|max:255',
        ]);

        $route = AppRoute::find($request->id);
        $route->fill($request->only(['name', 'http_req', 'uri', 'controller', 'action']));
        $route->updated_by = Auth::id();
        $route->save();

        return response()->json(['success' => true, 'message' => 'Route updated successfully.']);
    }
}
