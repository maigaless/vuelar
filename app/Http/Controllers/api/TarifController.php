<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarif;
use Illuminate\Validation\Rule;




class TarifController extends Controller
{
    /**
     * Display a listing of the tarifs.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllTarifs()
    {
        // Fetch all tarifs
        $tarifs = Tarif::all();

        // Return the tarifs as JSON (or pass to a view)
        return response()->json($tarifs);
    }

    /**
     * Store a newly created tarif in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTarif(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => ['required','string',Rule::unique('tarifs')->ignore($request->get('id')),],
            'isDefault' => 'nullable|boolean',
        ]);



        $Tarif = Tarif::updateOrCreate(['id' => $request->get('id')],
        ['name' =>$request->get('name'),
         'code' =>$request->get('code'),
         'isDefault' => $request->get('isDefault')]);
         

        $resp['succes'] = true;
        $resp['message'] = 'Tarif created successfully';
        $resp['tarif'] = $Tarif;
        return response()->json($resp, 201);
        // Return the created tarif as JSON

    }
}
