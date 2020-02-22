<?php

namespace Domains\Admin\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserLoginDTO;

class LoginPresenter
{
    /**
     * @return array
     */
    public function transformMany(): array
    {
    }

    /**
     * @param UserLoginDTO $userLoginDTO
     * @return array
     */
    public function transform(UserLoginDTO $userLoginDTO)
    {
        return [
            'name' => \Auth::user()->name,
            'id' => $userLoginDTO->getId(),
            'national_code' => \Auth::user()->national_code,
            'role' => ['name' => $userLoginDTO->getRole()->name, 'id' => $userLoginDTO->getRole()->id],
            'token' => $userLoginDTO->getToken()
        ];
    }
}