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
            'token'         => $userLoginDTO->getToken(),
            'redirection' =>$this->redirectionTo($userLoginDTO->getRole())
        ];
    }

    private function redirectionTo($role)
    {
        if($role->id == config('user.client_role_id') ){
            return 'page.client.profile';
        }
        return 'admin.login';

    }
}