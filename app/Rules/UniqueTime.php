<?php

namespace App\Rules;

use App\Models\Section;
use Illuminate\Contracts\Validation\Rule;

class UniqueTime implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the start and end times are unique
        $start = $value;
        $end = request()->get('end');
        // dd($start, $end);

        return !Section::where('start', $start)
                   ->where('end', $end)
                   ->exists();
    }

    public function message()
    {
        return 'The start and end times must be unique.';
    }
}
