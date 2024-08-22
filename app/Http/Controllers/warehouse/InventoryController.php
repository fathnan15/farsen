<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        return view(
            "warehouse.inventory",
            [
                'method_path' => base64_decode($request->input('path')),
            ]
        );
    }
}
