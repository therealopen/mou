<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractDelivery;
use App\Models\ContractDeliveryReport;



class ContractDeliveryController extends Controller
{
    public function store(Request $request)
    {
   

        // Validate the request data
        $validatedData = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'contract_delivery_name' => 'required|string|max:255',
            'contract_delivery_value' => 'required|string|max:255',
        ]);

   

        // Create the ContractDelivery entry
        $contractDelivery = ContractDelivery::create($validatedData);

   

        return redirect()->route('manage_contracts')->with('success', 'Contract Delivery created successfully.');
    }

    public function saveDeliveryReport(Request $request)
{
    $request->validate([
        'contract_delivery_id' => 'required|exists:contract_deliveries,id',
        'report_delivery_value' => 'required|string',
        'contract_delivery_comment' => 'nullable|string',
    ]);

    ContractDeliveryReport::create([
        'contract_delivery_id' => $request->input('contract_delivery_id'),
        'report_delivery_value' => $request->input('report_delivery_value'),
        'contract_delivery_comment' => $request->input('contract_delivery_comment'),
    ]);

    return redirect()->back()->with('success', 'Delivery progress saved successfully.');
}


}
