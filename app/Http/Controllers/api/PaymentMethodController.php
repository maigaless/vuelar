<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PaymentMethod;


class PaymentMethodController extends Controller
{
    //

    public function getAllPaymentsWays(){
        $payment_methods = PaymentMethod::all();
        return response()->json($payment_methods);
    }


public function storePaymentMethod(Request $request){
$request->validate([
'name' => 'required|string',
'code' => [
    'required',
    'string',
    Rule::unique('payment_methods')->ignore($request->get('id')),
],
'is_active'=>'boolean',
]);

$PaymentMethod = PaymentMethod::updateOrCreate(['id' => $request->get('id')],
                                 ['name' =>$request->get('name'),
                                  'code' =>$request->get('code'),
                                  'is_active' => $request->get('is_active') == null ? false:true]);
                                  

$resp['succes'] = true;
$resp['message'] = 'PaymentMethod created successfully';
$resp['paymentMethod'] = $PaymentMethod;
return response()->json($resp, 201);
}
}
