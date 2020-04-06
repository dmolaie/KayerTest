<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\LegateRegisterDTO;
use Domains\User\Services\Contracts\DTOs\UserSearchDTO;

class UserListForAdminRequest extends EhdaBaseRequest
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
            'national_code' => 'numeric',
            'name'          => 'string|max:30|min:3',
            'id'            => 'integer',
            'role_type'       => 'string',
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

    public function createUserSearchDTO(): UserSearchDTO
    {
        $userSearchDto = new UserSearchDTO();
        $userSearchDto->setName($this['name'])
            ->setId($this['id'])
            ->setNationalCode($this['national_code'])
            ->setRoleType($this['role_type']);

        return $userSearchDto;
    }
}
