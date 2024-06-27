<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $phoneCode = substr($value,0,4);
        if($phoneCode == '+852') {
            $firstNumber = substr($value,4,1);
            if($firstNumber=='5' || $firstNumber=='6' || $firstNumber=='9') {
                return true;
            }
            return false;
        }
        $phoneCode = substr($value,0,3);
        if($phoneCode == '+86') {
            $firstNumber = substr($value,3,1);
            if($firstNumber=='1') {
                return true;
            }
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('labels.log_in_register.invalid_number');
    }
}