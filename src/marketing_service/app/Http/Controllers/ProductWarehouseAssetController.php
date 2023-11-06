<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductWarehouseAssetController extends Controller
{
    public function addProduct(Request $request)
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

    public function addWarehouse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_level' => 'required|exists:level,id_level',
            'PIC' => 'required|exists:employee,id_employee',
            'name' => 'required|string|max:100',
            'capacity' => 'required|numeric',
            'address' => 'required|string|max:200',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $warehouse = Warehouse::create($request->all());

        return response()->json($warehouse, 201);
    }
}
