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
     */
    public function generateNumber($model)
    {
        // Fetch the template for the given model
        $pattern = DB::table('number_patterns')
            ->where('model', $model)
            ->first();

        if (!$pattern) {
            throw new \Exception("Number pattern for model {$model} not found.");
        }

        // Fetch the current sequence for this model
        $sequence = DB::table('number_sequences')->where('model', $model)->first();

        if (!$sequence) {
            // Initialize sequence if it doesn't exist
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
        $prefix = $this->replacePlaceholders($pattern->prefix ?? '', $sequenceValue);
        $suffix = $this->replacePlaceholders($pattern->suffix ?? '', $sequenceValue);
        $number = $pattern->template;

        $number = str_replace('{PREFIX}', $prefix, $number);
        $number = str_replace('{SEQUENCE}', str_pad($sequenceValue, 6, '0', STR_PAD_LEFT), $number);
        $number = str_replace('{SUFFIX}', $suffix, $number);

        return $number;
    }

    /**
     * Replace placeholders in prefix or suffix.
     *
     * @param string $text The text containing placeholders
     * @param int $sequenceValue The current sequence value
     * @return string
     */
    private function replacePlaceholders($text, $sequenceValue)
    {
        $replacements = [
            'YY' => Carbon::now()->format('y'),
            'MM' => Carbon::now()->format('m'),
            'dd' => Carbon::now()->format('d'),
            '{SEQUENCE}' => str_pad($sequenceValue, 6, '0', STR_PAD_LEFT),
        ];

        foreach ($replacements as $key => $value) {
            $text = str_replace($key, $value, $text);
        }

        return $text;
    }
}
