<?php

namespace App\Http\Controllers\warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view("warehouse.inventory", ['method_path' => 'warehouse/inventory']);
    }
}
