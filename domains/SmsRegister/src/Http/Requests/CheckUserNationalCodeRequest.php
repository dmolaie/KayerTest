<?php

namespace Domains\SmsRegister\Http\Requests;

use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Domains\User\Http\Requests\NationalCodeRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class CheckUserNationalCodeRequest extends FormRequest
{
    protected $firstStep = false;

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
        if (!empty($this[0]['Content']) && strlen($this[0]['Content']) == 10) {
            $this->firstStep = true;
            return [
                '0.Content'         => ['required', 'unique:users,national_code', 'numeric', new NationalCodeRequest],
                '0.UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
            ];
        }

        return [
            '0.Content'         => 'required|numeric|digits:8|min:10000000',
            '0.UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        if ($this->firstStep) {

            return [
                '0.Content.required'         => (trans('smsRegister::response.validation.national_code_required')),
                '0.Content.unique'           => (trans('smsRegister::response.validation.national_code_unique')),
                '0.Content.*'                => (trans('smsRegister::response.validation.national_code_all')),
                '0.UserPhoneNumber.regex'    => (trans('smsRegister::response.validation.userPhoneNumber_regex')),
                '0.UserPhoneNumber.required' => (trans('smsRegister::response.validation.userPhoneNumber_required')),
            ];
        }
        return [
            '0.Content.required'         => (trans('smsRegister::response.validation.birth_date_required')),
            '0.Content.*'                => (trans('smsRegister::response.validation.birth_date_all')),
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
        if ($this->firstStep) {
            $smsRegisterDTO->setNationalCode($this[0]['Content'])
                ->setFirstRequestContent($this->all());
            return $smsRegisterDTO;
        }
        $date = $this->convertDate($this[0]['Content']);
        $smsRegisterDTO->setBirthDate($date)
            ->setSecondRequestContent($this->all());
        return $smsRegisterDTO;
    }

    private function convertDate(string $date)
    {
        try {
            $date = str_split($date, 4);

            $year = $date[0];
            $monthDay = str_split($date[1], 2);
            $month = $monthDay[0];
            $day = $monthDay[1];
            return (new Jalalian($year, $month, $day))->toCarbon()->toDateString();
        } catch (\Exception $exception) {
            $smsRegister = new SmsRegisterDTO();
            $smsRegister->setMobileNumber($this[0]['UserPhoneNumber'])
                ->setContent((trans('smsRegister::response.validation.birth_date_all')))
                ->setChannelType($this[0]["ChannelType"] ?? '‫‪Imi‬‬');;
            event(new SmsRegisterEvent($smsRegister));
        }


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
}
