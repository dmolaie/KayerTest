<?php

namespace Domains\Role\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleInfoDTO;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleUserInfoDTO;

class GetPermissionToUserRequest extends EhdaBaseRequest
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
            'role_id' => 'required|integer|exists:roles,id',
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

    public function setPermissionRoleDTO()
    {
        $menusCreateDTO = new PermissionRoleUserInfoDTO();
        $menusCreateDTO->setRoleId($this['role_id'])
            ->setUserId($this['user_id'])
            ->setEntity('');
        return $menusCreateDTO;
    }
}
