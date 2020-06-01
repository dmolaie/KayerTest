<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\DTOMakers\ResetPasswordDTO;

class ResetPasswordValidateTokenRequest extends EhdaBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'national_code' => [new NationalCodeRequest, 'required', 'exists:users,national_code'],
            'mobile'        => 'required|regex:/(09)[0-9]{9}/',
            'token'         => 'required|digits:5|exists:password_reset_tokens,token',
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

    public function createResetPasswordDTO(): ResetPasswordDTO
    {
        $resetPasswordDTO = new ResetPasswordDTO();
        $resetPasswordDTO->setMobile($this['mobile'])
            ->setNationalCode($this['national_code'])
            ->setToken($this['token']);

        return $resetPasswordDTO;
    }
}
