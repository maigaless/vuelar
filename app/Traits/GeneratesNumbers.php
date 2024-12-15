<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

trait GeneratesNumbers
{
    /**
     * Generate a number based on the given model and template.
     *
     * @param string $model The model name (e.g., Product, Customer, Bill)
     * @return string
     * @throws \Exception
     */
    public function generateNumber($model)
    {
        // Fetch the pattern for the given model
        $pattern = DB::table('number_patterns')->where('model', $model)->first();

        if (!$pattern) {
            throw new \Exception("Number pattern for model '{$model}' not found.");
        }

        // Extract the number of zeros and other parts of the template
        $template = $pattern->template;
        $nbZeros = $pattern->Nb_zeros;

        // Fetch or initialize the sequence for the given model
        $sequence = DB::table('number_sequences')->where('model', $model)->first();
        if (!$sequence) {
            // Start sequence if it doesn't exist
            $sequenceValue = 1;
            DB::table('number_sequences')->insert([
                'model' => $model,
                'sequence' => $sequenceValue,
            ]);
        } else {
            $sequenceValue = $sequence->sequence + 1;
            DB::table('number_sequences')->where('model', $model)->update([
                'sequence' => $sequenceValue,
            ]);
        }

        // Replace placeholders in the template
        $generatedNumber = $this->replacePlaceholders($template, $sequenceValue, $nbZeros);

        return $generatedNumber;
    }

    /**
     * Replace placeholders in the template.
     *
     * @param string $template The template to process
     * @param int $sequenceValue The current sequence value
     * @param int $nbZeros The number of zeros for the incrementable part
     * @return string
     */
    private function replacePlaceholders($template, $sequenceValue, $nbZeros)
    {
        // Generate the padded sequence value
       
         $paddedSequence = str_pad($sequenceValue, $nbZeros, '0', STR_PAD_LEFT);

         // Replace the sequence placeholder
         $number = preg_replace('/\{0+\}/', $paddedSequence, $template);

        // Replace date placeholders dynamically
        $number = str_replace('YY', Carbon::now()->format('y'), $number);
        $number = str_replace('MM', Carbon::now()->format('m'), $number);
        $number = str_replace('DD', Carbon::now()->format('d'), $number);

        return $number;
    }
}
