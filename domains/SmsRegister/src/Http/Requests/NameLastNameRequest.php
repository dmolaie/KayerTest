<?php


namespace Domains\SmsRegister\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

class NameLastNameRequest implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $code)
    {

        try {
            $date = explode('-', $code);
            if (strlen($date[0]) >= 3 && strlen($date[1]) >= 3) {
                return true;
            }
            return false;
        } catch (\Exception $exception) {
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
        return trans('smsRegister::response.validation.name_lastName_all');
    }
}