<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProducts()
    {
        // Fetch all products
        $products = Product::with(['tarifs', 'depots', 'suppliers'])->get();

        // Return the products as JSON (or pass to a view)
        return response()->json($products);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreProduct(Request $request)
    {
             // Validate the incoming request
             $request->validate([
                'name' => 'required|string|max:255',
                'barcode' => 'required|string|max:255',
                'sku' => ['required','string',Rule::unique('products')->ignore($request->get('id')),],
                'description' => 'required|string|max:255',
                'cost' => 'required|decimal|min:0',
                'tracking_stock' => 'nullable|boolean',
                'stock' => 'required|integer|min:0',
            ]);
    
    
    
            $Product = Product::updateOrCreate(['id' => $request->get('id')],
            [
                'name' =>$request->get('name'),
                'barcode' =>$request->get('barcode'),
                'sku' => $request->get('sku'),
                'description' =>$request->get('description'),
                'cost' =>$request->get('cost'),
                'tracking_stock' => $request->get('tracking_stock'),
                'stock' =>$request->get('stock')
             
             ]);
             
    
            $resp['succes'] = true;
            $resp['message'] = 'product created successfully';
            $resp['product'] = $Product;
            return response()->json($resp, 201);
            // Return the created tarif as JSON
    
    }


//-----------------------Get Next Product Number-----------------------------------------
public function getNextProductNumber()
{
    try {
        // Fetch and reserve the next sequence
        $product = new \App\Models\Product();
        $nextNumber = $product->generateNumber('Product', true); // Pass a flag to reserve the number

        return response()->json([
            'success' => true,
            'next_number' => $nextNumber,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}

//---------------------------Roll back --------
public function rollbackNumber(Request $request)
{
    try {
        $product = new \App\Models\Product();
        $product->rollbackSequence('Product');

        return response()->json([
            'success' => true,
            'message' => 'Sequence rolled back successfully.',
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}


}