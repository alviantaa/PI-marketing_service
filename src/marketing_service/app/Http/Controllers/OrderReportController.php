<?php

namespace App\Http\Controllers;

use App\Models\AutoOrder;
use App\Models\ConsumptionReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderReportController extends Controller
{
    public function storeConsumptionReport(Request $request) 
    {
    $validator = Validator::make($request->all(), [
            'id_report' => 'required|string|max:10|unique:consumption_report',
            'id_order' => 'required|string|max:10|exists:order,id_order',
            'consumption' => 'required|numeric',
            'remaining_product' => 'required|numeric',
            'id_customer' => 'required|string|max:10|exists:customer,id_customer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $consumptionReport = ConsumptionReport::create($request->all());

        return response()->json($consumptionReport, 201);
    }

    public function storeAutoOrder(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'id_order' => 'required|string|max:10|unique:auto_order',
            'PIC' => 'required|string|max:10|exists:employee,id_employee',
            'id_customer' => 'required|string|max:10|exists:customer,id_customer',
            'id_asset' => 'required|string|max:6|exists:asset,id_asset',
            'id_product_location' => 'required|string|max:10|exists:product_location,id_product_location',
            'quantity' => 'required|numeric',
            'status' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $autoOrder = AutoOrder::create($request->all());

        return response()->json($autoOrder, 201);

    }
}