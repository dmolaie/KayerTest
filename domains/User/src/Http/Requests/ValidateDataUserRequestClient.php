<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\ValidationDataUserDTO;

class ValidateDataUserRequestClient extends EhdaBaseRequest
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
        $validationDataUserDTO->setNationalCode($this['national_code']);
        return $validationDataUserDTO;
    }
}
