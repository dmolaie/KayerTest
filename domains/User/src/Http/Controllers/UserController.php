<?php


namespace Domains\User\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\User\Entities\User;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Http\Presenters\UserBriefInfoPresenter;
use Domains\User\Http\Presenters\UserFullInfoPresenter;
use Domains\User\Http\Presenters\UserPaginateInfoPresenter;
use Domains\User\Http\Presenters\UserRegisterPresenter;
use Domains\User\Http\Requests\LegateRegisterRequest;
use Domains\User\Http\Requests\UpdateUserInfoRequest;
use Domains\User\Http\Requests\UserListForAdminRequest;
use Domains\User\Http\Requests\UserRegisterRequest;
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
        }catch (UserUnAuthorizedException $exception)
        {
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
        return $this->response($briefInfoPresenter->transform($data), Response::HTTP_OK);
    }

    /**
     * @param UserListForAdminRequest $request
     * @param UserPaginateInfoPresenter $paginateInfoPresenter
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListForAdmin(
        UserListForAdminRequest $request,
        UserPaginateInfoPresenter $paginateInfoPresenter
    )  {
        $usersPaginateInfoDTOs = $this->userService->filterUsers($request->createUserSearchDTO());
        return $this->response(
            $paginateInfoPresenter->transform($usersPaginateInfoDTOs),
            Response::HTTP_OK
        );
    }
}