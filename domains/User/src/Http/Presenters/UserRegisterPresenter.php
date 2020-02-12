<?php


namespace Domains\User\src\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserLoginDTO;

class UserRegisterPresenter
{
    public function transform(UserLoginDTO $userLoginDTO)
    {
        return [
            'name'          => $userLoginDTO->getName(),
            'national_code' => $userLoginDTO->getNationalCode(),
            'role'          => [
                'name' => $userLoginDTO->getRole()->name,
                'id'   => $userLoginDTO->getRole()->id
            ],
            'token'         => $userLoginDTO->getToken()
        ];
    }
}