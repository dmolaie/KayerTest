<?php


namespace Domains\User\Http\Controllers;


use Exception;
use App\Http\Controllers\EhdaBaseController;
use Domains\User\Http\Requests\UserRegisterRequest;
use Domains\User\Services\UserService;
use Domains\User\src\Http\Presenters\UserRegisterPresenter;
use Illuminate\Http\Response;

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
        } catch (Exception $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());

        }

    }
}