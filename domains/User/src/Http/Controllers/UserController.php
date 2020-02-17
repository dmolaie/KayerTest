<?php


namespace Domains\User\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\User\Http\Requests\UserRegisterRequest;
use Domains\User\Services\UserService;
use Domains\User\src\Http\Presenters\UserRegisterPresenter;
use Illuminate\Http\Response;

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
        $userRegisterDto = $request->createUserRegisterDTO();
        $userRegisterResult = $this->userService->register($userRegisterDto);
        return $this->response(
            $userRegisterPresenter->transform($userRegisterResult),
            Response::HTTP_OK,
            trans('user::response.success_register')
        );

    }
}