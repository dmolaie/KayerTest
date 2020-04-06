<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\ValidationDataUserDTO;

class ValidateDataUserRequestLegate extends EhdaBaseRequest
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
            'national_code' => ['required', 'numeric', new NationalCodeRequest],
            'name'          => 'required|string|max:30|min:3',
            'last_name'     => 'required|string|max:30|min:3',
            'mobile'        => 'required|regex:/(09)[0-9]{9}/',
            'email'         => 'required|string|email|max:255',
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

    public function validationDataUserDTO(): ValidationDataUserDTO
    {
        $validationDataUserDTO = new ValidationDataUserDTO();
        $validationDataUserDTO->setNationalCode($this['national_code'])
        ->setRoleType(config('user.legate_role_type'));
        return $validationDataUserDTO;
    }
}
