<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\UserAngelDTO;

class SearchUserAngelRequest extends EhdaBaseRequest
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
            'name' => 'required|string|min:3',
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

    public function searchUserAngel()
    {
        $userAngel = new UserAngelDTO();
        $userAngel->setName($this['name']);
        return $userAngel;
    }
}
