<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CatergoryController extends Controller
{
    public function getAllCategories(){
                $categories = Category::all();
                return response()->json($categories);
            }


 public function storeCategory(Request $request){
    $request->validate([
        'name' => 'required|string',
        'code' => [
            'required',
            'string',
            Rule::unique('categories')->ignore($request->get('id')),
        ],
        'parent_id' => 'nullable|integer|exists:categories,id',
    ]);

    $category = Category::updateOrCreate(['id' => $request->get('id')],
                                         ['name' =>$request->get('name'),
                                          'code' =>$request->get('code'),
                                          'parent_id' => $request->get('parent_id')]);
                                          

     $resp['succes'] = true;
     $resp['message'] = 'Category created successfully';
     $resp['category'] = $category;
    return response()->json($resp, 201);
}


}
