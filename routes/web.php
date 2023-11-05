<?php
use App\Models\AppRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/', 'dashboard');

try {
    $routes = AppRoute::all();
    foreach ($routes as $route) {
        if ($route->is_auth) {
            Route::match([$route->http_req], $route->uri, [join('\\',['App\Http\Controllers', $route->controller]), $route->action])->name($route->name)->middleware('auth');
        }
        else {
            Route::match([$route->http_req], $route->uri, [join('\\',['App\Http\Controllers', $route->controller]), $route->action])->name($route->name)->middleware('guest');
        }
    }
} catch (Exception $e) {
    echo '*************************************' . PHP_EOL;
    echo 'Error fetching database pages: ' . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo '*************************************' . PHP_EOL;
}
