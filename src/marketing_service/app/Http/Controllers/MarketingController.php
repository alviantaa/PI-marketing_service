<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
    public function index(Request $request)
    {
        return 'Hello, Laravel ' . $request->path();
    }

    public function storeCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_customer' => 'required|string|max:10|unique:customers',
            'name' => 'required|string|max:100',
            'email_cust' => 'required|email|max:100|unique:customers',
            'no_telp' => 'required|string|max:13',
            'sex' => 'required|string|max:1',
            'precise_location' => 'required|string|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    }
}
