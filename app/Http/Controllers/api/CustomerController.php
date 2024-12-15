<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    //

    public function AllCustomers(Request $request){
        $Customers = Customer::all();

        return response()->json($Customers);
    }



    public function StoreCustomer(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'ice_number' => 'nullable|string|max:255',
            'if_number' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'tel' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        // Create and store the customer
        $customer = Customer::updateOrCreate(
                                             ['id'=>$request->get('id')],
                                             [
                                                'code'=>$request->get('code'),
                                                'name'=>$request->get('name'),
                                                'ice_number'=>$request->get('ice_number'),
                                                'if_number'=>$request->get('if_number'),
                                                'email'=>$request->get('email'),
                                                'tel'=>$request->get('tel'),
                                                'is_active'=>$request->get('is_active'),


                                             ]);

        // Return a response
        return response()->json([
            'message' => 'Customer created successfully.',
            'customer' => $customer,
        ], 201);


    }
}
