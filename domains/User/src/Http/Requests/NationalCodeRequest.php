<?php


namespace Domains\User\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

class NationalCodeRequest implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $code)
    {
        $code = $this->convertToEnglishNumber($code);
        if(strlen($code) == 10){
            if(!preg_match('/^[0-9]{10}$/',$code))
                return false;
            for($i=0;$i<10;$i++)
                if(preg_match('/^'.$i.'{10}$/',$code))
                    return false;
            for($i=0,$sum=0;$i<9;$i++)
                $sum+=((10-$i)*intval(substr($code, $i,1)));
            $ret=$sum%11;
            $parity=intval(substr($code, 9,1));
            if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity))
                return true;
            return false;
        }elseif (strlen($code) == 12 || strlen($code) == 16){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('user::validation.error_code_national');
    }

    private function convertToEnglishNumber($string) {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string =  str_replace($persianDecimal, $newNumbers, $string);
        $string =  str_replace($arabicDecimal, $newNumbers, $string);
        $string =  str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }
}