<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //

    public function AllSuppliers(Request $request){
        
        $Suppliers = Supplier::all();

        return response()->json($Suppliers);
    }


    public function StoreSupplier(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
            'contact_tel' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        // Create and store the supplier
        $supplier = Supplier::updateOrCreate(
                                             ['id'=>$request->get('id')],
                                             [
                                                'code'=>$request->get('code'),
                                                'name'=>$request->get('name'),
                                                'contact_info'=>$request->get('contact_info'),
                                                'contact_tel'=>$request->get('contact_tel'),
                                                'contact_email'=>$request->get('contact_email'),
                                                'is_active'=>$request->get('is_active'),


                                             ]);

        // Return a response
        return response()->json([
            'message' => 'Supplier created successfully.',
            'supplier' => $supplier,
        ], 201);


    }


}
