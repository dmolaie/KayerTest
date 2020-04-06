<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\User\Services\Contracts\DTOs\UserChangeRoleDTO;
use Illuminate\Validation\Rule;

class ChangeUserRoleStatusRequest extends EhdaBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'     => 'required|integer|exists:users,id',
            'role_id'     => 'required|integer|exists:roles,id',
            'role_status' => ['required', 'string', Rule::in(config('user.user_role_status'))],
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

    public function createUserChangeRoleDTO(): UserChangeRoleDTO
    {
        $userChangeRoleDTO = new UserChangeRoleDTO();
        $userChangeRoleDTO->setUserId($this['user_id'])
            ->setRoleId($this['role_id'])
            ->setRoleStatus($this['role_status']);
        return $userChangeRoleDTO;
    }

}
