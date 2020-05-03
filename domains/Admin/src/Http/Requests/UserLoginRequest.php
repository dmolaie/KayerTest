<?php

namespace Domains\Admin\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
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
            'national_code' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha_api:' . $this['key']
        ];
    }

    public function createLoginDTO() : UserLoginDTO
    {
        $loginDTO = new UserLoginDTO();
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
