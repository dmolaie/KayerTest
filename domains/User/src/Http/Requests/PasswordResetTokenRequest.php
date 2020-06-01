<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;

class PasswordResetTokenRequest extends EhdaBaseRequest
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
}
