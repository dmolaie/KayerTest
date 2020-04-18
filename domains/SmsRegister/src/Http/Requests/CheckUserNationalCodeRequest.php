<?php

namespace Domains\SmsRegister\Http\Requests;

use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Domains\User\Http\Requests\NationalCodeRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class CheckUserNationalCodeRequest extends FormRequest
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
            'Content'         => ['required', 'unique:users,national_code', 'numeric', new NationalCodeRequest],
            'UserPhoneNumber' => 'required|regex:/(989)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            'Content.required'         => 'کدملی الزامی است.',
            'Content.unique'           => 'کدملی قبلا ثبت است.',
            'Content.*'                => 'فرمت کدملی نادرست است.',
            'UserPhoneNumber.regex'    => 'فرمت شماره موبایل نادرست است.',
            'UserPhoneNumber.required' => 'شماره موبایل الزامی است.',
        ];
    }

    public function attributes()
    {
        return trans('user::validation.attributes');
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

    public function createSmsRegisterDTO(): SmsRegisterDTO
    {
        $smsRegisterDTO = new SmsRegisterDTO();
        $smsRegisterDTO->setNationalCode($this['Content'])
            ->setMobileNumber($this['UserPhoneNumber'])
            ->setAccountId($this['AccountId'])
            ->setFirstRequestContent($this->all());
        return $smsRegisterDTO;
    }
}
