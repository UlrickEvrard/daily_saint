<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyTriompheSalary implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

       return str_contains(strtoupper($value), 'TRIOMPHESTUDIO');
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You are not authorize to access this application.';
    }
}
