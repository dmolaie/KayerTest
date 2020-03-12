<?php


namespace Domains\User\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Http\Presenters\UserBriefInfoPresenter;
use Domains\User\Http\Presenters\UserFullInfoPresenter;
use Domains\User\Http\Presenters\UserPaginateInfoPresenter;
use Domains\User\Http\Presenters\UserRegisterPresenter;
use Domains\User\Http\Requests\ChangeUserPasswordAdminRequest;
use Domains\User\Http\Requests\LegateRegisterRequest;
use Domains\User\Http\Requests\RegisterUserByAdminRequest;
use Domains\User\Http\Requests\UpdateUserInfoByAdminRequest;
use Domains\User\Http\Requests\UpdateUserInfoRequest;
use Domains\User\Http\Requests\UserListForAdminRequest;
use Domains\User\Http\Requests\UserRegisterRequest;
use Domains\User\Http\Requests\ValidateDataUserRequestClient;
use Domains\User\Http\Requests\ValidateDataUserRequestLegate;
use Domains\User\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 */
class UserController extends EhdaBaseController
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param UserRegisterRequest $request
     * @param UserRegisterPresenter $userRegisterPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegisterRequest $request, UserRegisterPresenter $userRegisterPresenter)
    {
        try {
            $userRegisterDto = $request->createUserRegisterDTO();
            $userRegisterResult = $this->userService->register($userRegisterDto);
            return $this->response(
                $userRegisterPresenter->transform($userRegisterResult),
                Response::HTTP_OK,
                trans('user::response.success_register')
            );
        } catch (UserDoseNotHaveActiveRole $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (UserUnAuthorizedException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * @param LegateRegisterRequest $request
     * @param UserRegisterPresenter $userRegisterPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function legateRegister(LegateRegisterRequest $request, UserRegisterPresenter $userRegisterPresenter)
    {
        try {
            $userRegisterDto = $request->createUserRegisterDTO();
            $userRegisterResult = $this->userService->register($userRegisterDto);
            return $this->response(
                $userRegisterPresenter->transform($userRegisterResult),
                Response::HTTP_OK,
                trans('user::response.success_register')
            );
        } catch (UserDoseNotHaveActiveRole $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (UserUnAuthorizedException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * @param UserFullInfoPresenter $userFullInfoPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFullUserInfo(UserFullInfoPresenter $userFullInfoPresenter)
    {
        $userId = Auth::id();
        $data = $userFullInfoPresenter->transform(
            $this->userService->getUserFullInfo($userId)
        );
        return $this->response($data, 200);
    }

    /**
     * @param UpdateUserInfoRequest $request
     * @param UserBriefInfoPresenter $briefInfoPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInfo(UpdateUserInfoRequest $request, UserBriefInfoPresenter $briefInfoPresenter)
    {
        $userId = Auth::id();
        $data = $this->userService->editUserInfo($userId, $request->createUserEditDTO());
        return $this->response(
            $briefInfoPresenter->transform($data),
            Response::HTTP_OK,
            trans('user::response.edit_profile_successful')
        );
    }

    /**
     * @param UserListForAdminRequest $request
     * @param UserPaginateInfoPresenter $paginateInfoPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListForAdmin(
        UserListForAdminRequest $request,
        UserPaginateInfoPresenter $paginateInfoPresenter
    ) {
        $usersPaginateInfoDTOs = $this->userService->filterUsers($request->createUserSearchDTO());
        return $this->response(
            $paginateInfoPresenter->transform($usersPaginateInfoDTOs),
            Response::HTTP_OK
        );
    }

    /**
     * @param ValidateDataUserRequestClient $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ValidateDataUserClient(ValidateDataUserRequestClient $request)
    {
        try {
            $validateDataUserDto = $request->validationDataUserDTO();
            $validateUserResult = $this->userService->ValidateUserWithRole($validateDataUserDto);

            if (!$validateUserResult) {
                return $this->response(
                    [],
                    Response::HTTP_UNPROCESSABLE_ENTITY,
                    trans('user::response.user_has_profile_register_client')
                );
            }
            return $this->response(
                [],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                trans('user::response.role_have_this_role')
            );

        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_OK, trans('user::response.user_can_register'));
        }

    }

    /**
     * @param ValidateDataUserRequestLegate $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ValidateDataUserLegate(ValidateDataUserRequestLegate $request)
    {
        try {
            $validateDataUserDto = $request->validationDataUserDTO();
            $validateUserResult = $this->userService->ValidateUserWithRole($validateDataUserDto);


            if (!$validateUserResult) {
                return $this->response(
                    [],
                    Response::HTTP_UNPROCESSABLE_ENTITY,
                    trans('user::response.user_has_role_register_legate')
                );
            }
            return $this->response(
                [],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                trans('user::response.role_have_this_role')
            );

        } catch (ModelNotFoundException $exception) {
            $request->session()->put('national_code', $request->national_code);
            $request->session()->put('name', $request->name);
            $request->session()->put('last_name', $request->last_name);
            $request->session()->put('mobile', $request->mobile);
            $request->session()->put('email', $request->email);
            return $this->response([
                'redirection' => route('page.volunteers.finalstep', config('app.locale'))
            ], Response::HTTP_OK, trans('user::response.user_can_register'));
        }

    }

    /**
     * @param UpdateUserInfoByAdminRequest $request
     * @param UserBriefInfoPresenter $briefInfoPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInfoByAdmin(
        UpdateUserInfoByAdminRequest $request,
        UserBriefInfoPresenter $briefInfoPresenter
    ) {

        $data = $this->userService->editUserInfo($request['user_id'], $request->createUserEditDTO());
        return $this->response(
            $briefInfoPresenter->transform($data),
            Response::HTTP_OK,
            trans('user::response.edit_profile_successful')
        );
    }

    /**
     * @param ChangeUserPasswordAdminRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeUserPasswordByAdmin(ChangeUserPasswordAdminRequest $request)
    {
        try {
            $this->userService->changePasswordByAdmin($request['user_id'], $request['password']);
            return $this->response(
                [],
                Response::HTTP_OK,
                trans('user::response.change_password_by_admin_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('user::response.user_not_found')
            );
        }
    }

    /**
     * @param RegisterUserByAdminRequest $request
     * @param UserBriefInfoPresenter $briefInfoPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerUserByAdmin(
        RegisterUserByAdminRequest $request,
        UserBriefInfoPresenter $briefInfoPresenter
    ) {
        $userRegisterResult = $this->userService->registerByAdmin($request->createUserRegisterDTO());
        return $this->response(
            $briefInfoPresenter->transform($userRegisterResult),
            Response::HTTP_CREATED,
            trans('user::response.success_register')
        );
    }
}