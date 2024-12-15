<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NumberPattern;
use App\Models\NumberSequence;
use Illuminate\Validation\Rule;

class NumberPatternController extends Controller
{
    //
    public function AllPatterns()
    {
        $numbers = NumberPattern::all(); // Flatten if necessary
        return response()->json($numbers);
    }




    public function storePattern(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'id' => 'nullable|exists:number_patterns,id', // Check if the ID exists for update
            'model' => 'required|string|max:255|unique:number_patterns,model,' . $request->id, // Ensure unique model name
            'template' => 'required|string|max:255', // Template is required
            'nb_zeros'=>'integer'
        ]);

        try {
            // Create or update the number pattern
            $pattern = NumberPattern::updateOrCreate(
                ['id' => $request->id], // Check for existing ID
                [
                    'model' => $validated['model'],
                    'template' => $validated['template'],
                    'nb_zeros' => $validated['nb_zeros'] ?? 0,
                   
                ]
            );

            if (!$request->id){
                $sequence = NumberSequence::create(['model'=>$validated['model'],'sequence'=>0 ]);
            }

            return response()->json([
                'success' => true,
                'message' => $request->id ? 'Pattern updated successfully' : 'Pattern created successfully',
                'numberPattern' => $pattern,
                'sequance' => $sequence,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function resetSequance(Request $request){
        
      

        $sequence = NumberSequence::where('model',$request->get('model'))->first();

        if ($sequence) {
            # code...

             
        $sequence->sequence = 0;
        $sequence->save();

        return response()->json([
            'success' => true,
            'message' => 'Sequences saved successfully for model ' . $request->get('model'),
            
        ], 200);
        } else {
            # code...
            $sequence = NumberSequence::create(['model'=>$request->get('model'),'sequence'=>0 ]);

            return response()->json([
                'success' => true,
                'message' => $request->get('model').' is initialized successfully ',
                
            ], 200);
        }
       
    }
}
