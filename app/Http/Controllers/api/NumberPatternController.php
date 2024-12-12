<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NumberPattern;
use Illuminate\Validation\Rule;

class NumberPatternController extends Controller
{
    //

    public function AllPatterns(){
         
         return response()->json(['numbers'=>NumberPattern::all()], 200);
    }


    public function storePattern(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'nullable|exists:number_patterns,id', // Check if the ID exists for update
            'model' => 'required|string|max:255|unique:number_patterns,model,' . $request->id, // Ensure unique model name
            'template' => 'required|string|max:255', // Template is required
            'prefix' => 'nullable|string|max:255', // Prefix can be null
            'suffix' => 'nullable|string|max:255', // Suffix can be null
        ]);

        try {
            // Create or update the number pattern
            $pattern = NumberPattern::updateOrCreate(
                ['id' => $request->id], // Check for existing ID
                [
                    'model' => $validated['model'],
                    'template' => $validated['template'],
                    'prefix' => $validated['prefix'] ?? null,
                    'suffix' => $validated['suffix'] ?? null,
                ]
            );

            return response()->json([
                'success' => true,
                'message' => $request->id ? 'Pattern updated successfully' : 'Pattern created successfully',
                'pattern' => $pattern,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
}
