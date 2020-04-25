<?php


namespace Domains\SmsRegister\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Morilog\Jalali\Jalalian;

class BirthDateRequest implements Rule
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
            $date = str_split($code, 4);

            $year = $date[0];
            $monthDay = str_split($date[1], 2);
            $month = $monthDay[0];
            $day = $monthDay[1];
            $date = (new Jalalian($year, $month, $day))->toCarbon()->toDateString();
            return true;
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
        return trans('smsRegister::response.validation.birth_date_all');
    }
}