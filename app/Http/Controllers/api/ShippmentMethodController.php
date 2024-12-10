<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippmentMethod;
use Illuminate\Validation\Rule;

class ShippmentMethodController extends Controller
{
    
    public function getAllShippingsWays(){
        $Shipping_methods = ShippmentMethod::all();
        return response()->json($Shipping_methods);
    }


public function storeShippmentMethod(Request $request){
$request->validate([
'name' => 'required|string',
'code' => [
    'required',
    'string',
    Rule::unique('shippment_methods')->ignore($request->get('id')),
],
'is_active'=>'boolean',
]);

$ShippmentMethod = ShippmentMethod::updateOrCreate(['id' => $request->get('id')],
                                 ['name' =>$request->get('name'),
                                  'code' =>$request->get('code'),
                                  'is_active' => $request->get('is_active') == null ? false:true]);
                                  

$resp['succes'] = true;
$resp['message'] = 'ShippmentMethod created successfully';
$resp['ShippmentMethod'] = $ShippmentMethod;
return response()->json($resp, 201);
}
}
