<?php

namespace App\Http\Controllers;

use App\Models\ProductLocation;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



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
            'PIC' => 'required|max:6|exists:employee,id_employee',
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
    public function storeProductLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_product_location' => 'required|max:6|unique:product_location',
            'id_product' => 'required|max:6|exists:product,id_product',
            'id_warehouse' => 'required|max:6|exists:warehouse,id_warehouse',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $productlocation = ProductLocation::create($request->all());

        return response()->json($productlocation, 201);
    }

public function storeAsset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_asset' => 'required|max:6|unique:asset',
	        'asset_name' => 'required|string|max:100',
            'asset_type' => 'required|string|max:100',
	        'spesification' => 'required|string|max:245',
            'PIC' => 'required|string|max:6|exists:employee,id_employee',
            'id_warehouse' => 'required|max:6|exists:warehouse,id_warehouse',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $asset = Asset::create($request->all());

        return response()->json($asset, 201);
    }

    public function readProduct()
    {
    $products = Product::all();

    return response()->json($products, 200);
    }

public function readWarehouse()
{
    $warehouses = Warehouse::join('level', 'warehouse.id_level', '=', 'level.id_level')
        ->select(
            'warehouse.id_warehouse',
            'warehouse.id_level',
            'level.level',
            'warehouse.PIC',
            'warehouse.name',
            'warehouse.capacity',
            'warehouse.address'
        )
        ->get();

    return response()->json($warehouses, 200);
}

public function readProductLocation()
{
    $productLocations = DB::table('product_location')
        ->join('product', 'product_location.id_product', '=', 'product.id_product')
        ->join('warehouse', 'product_location.id_warehouse', '=', 'warehouse.id_warehouse')
        ->select(
            'product_location.id_product_location',
            'product_location.id_product',
            'product.product_name',
            'product_location.id_warehouse',
            'warehouse.name as warehouse_name'
        )
        ->get();

    return response()->json($productLocations, 200);
}

public function readAsset(Request $request)
{
    $assets = DB::table('asset')
        ->join('warehouse', 'asset.id_warehouse', '=', 'warehouse.id_warehouse')
        ->select(
            'asset.id_asset',
            'asset.asset_name',
            'asset.asset_type',
            'asset.spesification',
            'asset.PIC',
            'warehouse.id_warehouse',
            'warehouse.name as warehouse_name'
        )
        ->get();

    return response()->json($assets, 200);
}
}
