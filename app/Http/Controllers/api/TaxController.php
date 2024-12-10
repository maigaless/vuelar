<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Validation\Rule;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllTaxes()
    {
        return response()->json(Tax::all(), 200);
    }


    public function storeTax(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => ['required','string',Rule::unique('taxes')->ignore($request->get('id'))],
            'rate' => ['required','integer']
        ]);



        $Tax = Tax::updateOrCreate(['id' => $request->get('id')],
        [
         'name' =>$request->get('name'),
         'code' =>$request->get('code'),
         'rate' =>$request->get('rate'),
         'percentage' => $request->boolean('percentage'),
         'is_active' => $request->boolean('is_active') == null ? false :true]);
         

        $resp['succes'] = true;
        $resp['message'] = 'Tarif created successfully';
        $resp['tax'] = $Tax;
        return response()->json($resp, 201);
      

    }

  
}
