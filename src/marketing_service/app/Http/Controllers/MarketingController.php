<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
    public function index()
    {
        return response("Hello, Testing");
    }
}
