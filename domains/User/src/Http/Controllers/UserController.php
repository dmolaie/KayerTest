<?php


namespace Domains\User\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserValidateDataUserException;
use Domains\User\Http\Presenters\UserFullInfoPresenter;
use Domains\User\Http\Presenters\UserRegisterPresenter;
use Domains\User\Http\Requests\LegateRegisterRequest;
use Domains\User\Http\Requests\UserRegisterRequest;
use Domains\User\Http\Requests\ValidateDataUserRequest;
use Domains\User\Services\UserService;
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
        }
    }

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
        }
    }

    public function getFullUserInfo(UserFullInfoPresenter $userFullInfoPresenter)
    {
        $userId = Auth::id();
        $data = $userFullInfoPresenter->transform(
            $this->userService->getUserFullInfo($userId)
        );
        return $this->response($data, 200);
    }

    public function ValidateDataUserClient(ValidateDataUserRequest $request)
    {
        try {
            $validateDataUserDto = $request->validationDataUserDTO();
            $validateUserResualt = $this->userService->ValidateDataUserClient($validateDataUserDto);

            if (!$validateUserResualt) {
                return $this->response(
                    [],
                    Response::HTTP_OK,
                    trans('user::response.user_can_register')
                );
            }
            return $this->response(
                [],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                trans('user::response.role_have_this_role')
            );

        } catch (UserValidateDataUserException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }

    }

    public function ValidateDataUserLegate(ValidateDataUserRequest $request)
    {
        try {
            $validateDataUserDto = $request->validationDataUserDTO();
            $validateUserResualt = $this->userService->ValidateDataUserLegate($validateDataUserDto);

            if (!$validateUserResualt) {
                return $this->response(
                    [],
                    Response::HTTP_OK,
                    trans('user::response.user_can_register')
                );
            }
            return $this->response(
                [],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                trans('user::response.role_have_this_role')
            );

        } catch (UserValidateDataUserException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }

    }
}