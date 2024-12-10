<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepotStock;
use Illuminate\Validation\Rule;


class DepotStockController extends Controller
{
    //

    public function getAllDepotsStock(){
        $depots = DepotStock::all();
        return response()->json($depots);
    }


    public function storeDepot(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ds_name' => 'required|string|max:255',
            'ds_code' => ['required','string',Rule::unique('depotstocks')->ignore($request->get('id')),],
            'ds_isDefault' => 'nullable|boolean',
            'ds_parent_id' => 'nullable|integer|exists:depotstocks,id',
        ]);



        $depotstock = DepotStock::updateOrCreate(['id' => $request->get('id')],
        ['ds_name' =>$request->get('ds_name'),
         'ds_code' =>$request->get('ds_code'),
         'ds_isDefault' => $request->get('ds_isDefault') == null ? false : true ,
         'ds_type' => $request->get('ds_type'),
         'ds_parent_id'=>$request->get('ds_parent_id')
         ]);
         

        $resp['succes'] = true;
        $resp['message'] = 'created successfully';
        $resp['depotstock'] = $depotstock;
        return response()->json($resp, 201);
        // Return the created tarif as JSON

    }
}
