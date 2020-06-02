<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\UserAngelDTO;

class UserAngelRequest extends EhdaBaseRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'year' => 'required|integer|digits_between:4,4',
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

    public function addUserAngel()
    {
        $userAngel = new UserAngelDTO();
        $userAngel->setUserId($this['user_id']);
        $userAngel->setYear($this['year']);
        return $userAngel;
    }
}
