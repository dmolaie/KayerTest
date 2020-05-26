<?php


namespace Domains\SmsRegister\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

class FailDateRequest implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $code)
    {
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('smsRegister::response.validation.incorrect_data_format');
    }
}