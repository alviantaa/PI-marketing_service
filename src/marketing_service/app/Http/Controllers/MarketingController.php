<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function readCustomer()
    {
        $customers = Customer::all();
        return response()->json($customers, 200);
    }
    
    public function storeBusinessCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_business_category' => 'required|string|max:5|unique:business_categories',
            'category' => 'required|string|max:20',
            'max_capacity' => 'required|numeric',
            'id_product' => 'required|string|max:6|exists:product,id_product',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $businessCategory = BusinessCategory::create($request->all());

        return response()->json($businessCategory, 201);
    }
}
