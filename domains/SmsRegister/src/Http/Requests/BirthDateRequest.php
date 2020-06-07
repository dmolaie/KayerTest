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
        $code = $this->convertToEnglishNumber($code);
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

        }catch (\Throwable $exception){
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

    private function convertToEnglishNumber($string)
    {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string = str_replace($persianDecimal, $newNumbers, $string);
        $string = str_replace($arabicDecimal, $newNumbers, $string);
        $string = str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }
}