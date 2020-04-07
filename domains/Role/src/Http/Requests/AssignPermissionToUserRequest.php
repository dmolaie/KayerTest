<?php

namespace Domains\Role\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleInfoDTO;

class AssignPermissionToUserRequest extends EhdaBaseRequest
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
            'role_id.*' => 'required|integer|exists:roles,id',
            'permission_id.*' => 'required|integer|exists:permissions,id',
            'condition' => 'json',
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

    public function assignPermissionRoleDTO()
    {
        $menusCreateDTO = new PermissionRoleInfoDTO();
        $menusCreateDTO->setRoleId($this['role_id'])
            ->setUserId($this['user_id'])
            ->setPermission($this['permission_id'])
            ->setCondition($this['condition']);
        return $menusCreateDTO;
    }
}
