<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index (Request $request)
    {
        return 'Hello, Laravel ' . $request->path();
    }
}
