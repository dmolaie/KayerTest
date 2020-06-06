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
}