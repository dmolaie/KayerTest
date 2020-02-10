<?php

namespace Domains\Admin\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Admin\Services\Contracts\LoginDTOs\LoginDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserLoginRequest extends EhdaBaseRequest
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
            'national_code' => 'required|integer',
            'password' => 'required|string'
        ];
    }

    public function createLoginDTO() : LoginDTO
    {
        $loginDTO = new LoginDTO();
        $loginDTO->setNationalCode($this['national_code']);
        $loginDTO->setPassword($this['password']);
        return $loginDTO;
        
    }

    public function messages()
    {
        return trans('admin::validation');
    }


    public function attributes()
    {
        return trans('admin::validation.attributes');
    }
}
