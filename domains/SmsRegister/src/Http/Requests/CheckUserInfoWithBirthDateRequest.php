<?php

namespace Domains\SmsRegister\Http\Requests;

use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
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
        return trans('user::validation');
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
            ->setSecondRequestContent($this->all());
        return $smsRegisterDTO;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {

        $response = response()->json([
            'data'        => [],
            'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'     => trans('config.request_validation_invalid'),
            'errors'      => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
