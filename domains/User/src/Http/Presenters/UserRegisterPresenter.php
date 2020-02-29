<?php


namespace Domains\User\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserLoginDTO;

class UserRegisterPresenter
{
    public function transform(UserLoginDTO $userLoginDTO)
    {
        return [
            'name'          => $userLoginDTO->getName(),
            'card_id'          => $userLoginDTO->getCardId(),
            'id'          => $userLoginDTO->getId(),
            'national_code' => $userLoginDTO->getNationalCode(),
            'role'          => [
                'name' => $userLoginDTO->getRole()->name,
                'id'   => $userLoginDTO->getRole()->id
            ],
            'token'         => $userLoginDTO->getToken()
        ];
    }
}