<?php

namespace Domains\SmsRegister\Http\Requests;

use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class CheckUserNationalCodeRequest extends FormRequest
{
    protected $step = 'first';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!empty($this[0]['Content']) && strpos($this[0]['Content'], '-') != false) {
            $this->step = 'third';
            return [
                '0.Content'         => ['required', 'string', new NameLastNameRequest],
                '0.UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
            ];
        }

        if (!empty($this[0]['Content']) && (strlen($this[0]['Content']) == 10 || strlen($this[0]['Content']) == 20)) {
            $this->step = 'first';
            return [
                '0.Content'         => ['required', new NationalCodeRequest()],
                '0.UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
            ];
        }

        if (!empty($this[0]['Content']) && (strlen($this[0]['Content']) == 8 || strlen($this[0]['Content']) == 16)) {
            $this->step = 'second';
            return [
                '0.Content'         => ['required', new BirthDateRequest],
                '0.UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
            ];
        }
        return [
            '0.Content'         => [new FailDateRequest],
            '0.UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        if ($this->step == 'first') {

            return [
                '0.Content.required'         => (trans('smsRegister::response.validation.national_code_required')),
                '0.Content.unique'           => (trans('smsRegister::response.validation.national_code_unique')),
                '0.Content.*'                => (trans('smsRegister::response.validation.national_code_all')),
                '0.UserPhoneNumber.regex'    => (trans('smsRegister::response.validation.userPhoneNumber_regex')),
                '0.UserPhoneNumber.required' => (trans('smsRegister::response.validation.userPhoneNumber_required')),
            ];
        }
        if ($this->step == 'second') {
            return [
                '0.Content.required'         => (trans('smsRegister::response.validation.birth_date_required')),
                '0.Content.*'                => (trans('smsRegister::response.validation.incorrect_data_format')),
                '0.UserPhoneNumber.regex'    => (trans('smsRegister::response.validation.userPhoneNumber_regex')),
                '0.UserPhoneNumber.required' => (trans('smsRegister::response.validation.userPhoneNumber_required')),
            ];
        }
        return [
            '0.Content.required'         => (trans('smsRegister::response.validation.name_lastName_required')),
            '0.Content.*'                => (trans('smsRegister::response.validation.incorrect_data_format')),
            '0.UserPhoneNumber.regex'    => (trans('smsRegister::response.validation.userPhoneNumber_regex')),
            '0.UserPhoneNumber.required' => (trans('smsRegister::response.validation.userPhoneNumber_required')),
        ];
    }

    public function attributes()
    {
        return trans('user::validation.attributes');
    }

    public function createSmsRegisterDTO(): SmsRegisterDTO
    {
        $smsRegisterDTO = new SmsRegisterDTO();
        $smsRegisterDTO
            ->setMobileNumber($this[0]['UserPhoneNumber'])
            ->setChannelType($this[0]["ChannelType"] ?? '‫‪Imi‬‬');
        if ($this->step == 'first') {
            $smsRegisterDTO->setNationalCode($this->convertToEnglishNumber($this[0]['Content']))
                ->setFirstRequestContent($this->all());
            return $smsRegisterDTO;
        } elseif ($this->step == 'second') {
            $date = $this->convertDate($this->convertToEnglishNumber($this[0]['Content']));
            $smsRegisterDTO->setBirthDate($date)
                ->setSecondRequestContent($this->all());
            return $smsRegisterDTO;
        }

        $date = explode('-', $this[0]['Content']);
        $smsRegisterDTO->setName($date[0])
            ->setLastName($date[1])
            ->setThirdRequestContent($this->all());
        return $smsRegisterDTO;

    }

    private function convertDate(string $date)
    {
        $date = str_split($date, 4);

        $year = $date[0];
        $monthDay = str_split($date[1], 2);
        $month = $monthDay[0];
        $day = $monthDay[1];
        return (new Jalalian($year, $month, $day))->toCarbon()->toDateString();
    }

    protected function failedValidation(Validator $validator)
    {
        $this->sendMessageToUser($validator);

        $response = response()->json([
            'data'        => [],
            'status_code' => Response::HTTP_OK
        ], Response::HTTP_OK);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    protected function sendMessageToUser(Validator $validator): void
    {
        if (isset($this[0]['UserPhoneNumber'])) {

            $smsRegister = new SmsRegisterDTO();
            $smsRegister->setMobileNumber($this[0]['UserPhoneNumber'])
                ->setContent(
                    implode(',', array_column(
                        array_values($validator->errors()->messages()),
                        '0'
                    )))
                ->setChannelType($this[0]["ChannelType"] ?? '‫‪Imi‬‬');;
            event(new SmsRegisterEvent($smsRegister));
        }
        return;
    }

    private function convertToEnglishNumber($string = null) {
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
