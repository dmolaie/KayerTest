<?php


namespace Domains\User\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserLoginDTO;

class UserRegisterPresenter
{
    public function transform(UserLoginDTO $userLoginDTO)
    {
        return [
            'name'          => $userLoginDTO->getName(),
            'national_code' => $userLoginDTO->getNationalCode(),
            'role'          => [
                'name' => $userLoginDTO->getRole()->getRoleName(),
                'id'   => $userLoginDTO->getRole()->getRoleId()
            ],
            'token'         => $userLoginDTO->getToken()
        ];
    }
}