<?php


namespace Domains\User\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\User\Exceptions\PasswordResetMobileValidationException;
use Domains\User\Http\Requests\PasswordResetTokenRequest;
use Domains\User\Http\Requests\ResetPasswordByTokenRequest;
use Domains\User\Http\Requests\ResetPasswordValidateTokenRequest;
use Domains\User\Services\PasswordResetService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

/**
 * Class PasswordResetController
 */
class PasswordResetController extends EhdaBaseController
{
    /**
     * @var PasswordResetService
     */
    private $passwordResetService;

    /**
     * PasswordResetController constructor.
     * @param PasswordResetService $passwordResetService
     */
    public function __construct(PasswordResetService $passwordResetService)
    {
        $this->passwordResetService = $passwordResetService;
    }

    /**
     * @param PasswordResetTokenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPasswordResetToken(PasswordResetTokenRequest $request)
    {
        try {
            $this->passwordResetService->generateToken($request['national_code'], $request['mobile']);
            return $this->response([], Response::HTTP_OK);
        } catch (PasswordResetMobileValidationException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }

    }

    /**
     * @param ResetPasswordByTokenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPasswordByToken(ResetPasswordByTokenRequest $request)
    {
        try{
            $this->passwordResetService->changePassword($request->createResetPasswordDTO());

            return $this->response([], Response::HTTP_OK, trans('user::response.passwordChanged'));

        }catch (ModelNotFoundException $exception){
            return $this->response([], Response::HTTP_NOT_FOUND, trans('user::response.canNotResetPassword'));
        }
    }

    public function resetPasswordValidationToken(ResetPasswordValidateTokenRequest $request)
    {
        try {
            $this->passwordResetService->validateToken($request->createResetPasswordDTO());

            return $this->response([], Response::HTTP_OK, trans('user::response.tokenIsValid'));

        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND, trans('user::response.canNotResetPassword'));
        }
    }
}