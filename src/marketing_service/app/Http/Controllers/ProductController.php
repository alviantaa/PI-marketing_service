<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:50',
            'batch' => 'required|string|max:10',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }
}
