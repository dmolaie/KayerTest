<?php


namespace Domains\Admin\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\Admin\Http\Presenters\LoginPresenter;
use Domains\Admin\Http\Requests\UserLoginRequest;
use Domains\Admin\Http\Resources\LoginResource;
use Domains\Admin\Services\AdminServices;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends EhdaBaseController
{
    protected $adminService;

    public function __construct(AdminServices $adminService)
    {
        $this->adminService = $adminService;
    }

    public function login(UserLoginRequest $request, LoginPresenter $loginPresenter)
    {
        try {
            $result = $this->adminService->login($request->createLoginDTO());
            return $this->response($loginPresenter->transform($result), Response::HTTP_OK, trans('admin::response.authenticate.successful_login'));

        } catch (\Exception $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }

    }
}