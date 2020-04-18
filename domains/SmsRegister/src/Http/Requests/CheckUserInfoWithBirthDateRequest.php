<?php

namespace Domains\SmsRegister\Http\Requests;

use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class CheckUserInfoWithBirthDateRequest extends FormRequest
{
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
        return [
            'Content'         => 'required|numeric',
            'UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            'Content.required'  => 'تاریخ تولد الزامی است.',
            'Content.numeric'  => 'فرمت تاریخ تولد نادرست است.',
            'UserPhoneNumber.regex'  => 'فرمت شماره موبایل نادرست است.',
            'UserPhoneNumber.required' => 'شماره موبایل الزامی است.',
        ];
    }

    public function attributes()
    {
        return trans('user::validation.attributes');
    }

    public function createSmsRegisterDTO(): SmsRegisterDTO
    {
        $smsRegisterDTO = new SmsRegisterDTO();
        $smsRegisterDTO->setBirthDate($this['Content'])
            ->setMobileNumber($this['UserPhoneNumber'])
            ->setAccountId($this['AccountId'])
            ->setSecondRequestContent($this->all());
        return $smsRegisterDTO;
    }

    protected function failedValidation(Validator $validator)
    {
        $this->sendMessageToUser($validator);

        $response = response()->json([
            'data'        => [],
            'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'     => trans('config.request_validation_invalid'),
            'errors'      => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    protected function sendMessageToUser(Validator $validator): void
    {
        if (isset($this['UserPhoneNumber'])) {
            $smsRegister = $this->createSmsRegisterDTO();
            $smsRegister->setContent(
                implode(',', array_column(
                    array_values($validator->errors()->messages()),
                    '0'
                )));
            event(new SmsRegisterEvent($smsRegister));
        }
        return;
    }

}
