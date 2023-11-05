<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function storeCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_customer' => 'required|string|max:10|unique:customers',
            'name' => 'required|string|max:100',
            'email_cust' => 'required|email|max:100|unique:customers',
            'no_telp' => 'required|string|max:13',
            'sex' => 'required|string|max:1',
            'precise_location' => 'required|string|max:250',
            'id_kelurahan' => 'required|string|max:8|exists:kelurahan,id_kelurahan',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    }
    public function index (Request $request)
    {
        return 'Hello, Laravel ' . $request->path();
    }
}
