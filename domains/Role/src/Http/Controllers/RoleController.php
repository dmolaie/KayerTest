<?php


namespace Domains\Role\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\Role\Http\Presenters\AllRoleWithUserPresenter;
use Domains\Role\Http\Presenters\PermissionRoleUserPresenter;
use Domains\Role\Http\Requests\AssignPermissionToUserRequest;
use Domains\Role\Http\Requests\GetPermissionToUserRequest;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleInfoDTO;
use Domains\Role\Services\RoleServices;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserController
 */
class RoleController extends EhdaBaseController
{
    /**
     * @var RoleServices
     */
    private $roleServices;

    /**
     * UserController constructor.
     * @param RoleServices $roleServices
     */
    public function __construct(RoleServices $roleServices)
    {
        $this->roleServices = $roleServices;
    }

    public function assignPermissionUser(AssignPermissionToUserRequest $request,PermissionRoleInfoDTO $permissionRoleInfoDTO)
    {
        try{
            $this->roleServices->assignPermissionRoleToUser($request->assignPermissionRoleDTO($permissionRoleInfoDTO));
            return $this->response([],
                Response::HTTP_OK,
                trans('role::response.assign_permission_role_success')
            );
        }catch (UnprocessableEntityHttpException $exception)
        {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }

    public function getPermissionUser(GetPermissionToUserRequest $request,PermissionRoleUserPresenter $permissionRoleUserPresenter)
    {
        try{
            $permissions = $this->roleServices->getPermissionRoleToUser($request->setPermissionRoleDTO());
            return $this->response($permissionRoleUserPresenter->transformMany($permissions),
                Response::HTTP_OK,
                trans('role::response.assign_permission_role_success')
            );
        }catch (UnprocessableEntityHttpException $exception)
        {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }

    public function legateRoles(int $id, AllRoleWithUserPresenter $allRoleWithUserPresenter)
    {
        $allRoleWithUserDTO = $this->roleServices->getRolesByType(
            $id, config('role.legate_role_type')
        );
        return $this->response($allRoleWithUserPresenter->transform($allRoleWithUserDTO),
            Response::HTTP_OK
        );
    }
}