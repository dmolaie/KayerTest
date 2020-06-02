<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\AngelUserBriefInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserAngelBriefInfoDTOMaker
{

    public function convertMany($users)
    {
        return $users->map(function ($user) {
            return $this->convert($user);
        })->toArray();
    }

    public function convert(User $user): AngelUserBriefInfoDTO
    {
        $userAngelBriefInfoDTO = new AngelUserBriefInfoDTO();
        $userAngelBriefInfoDTO->setId($user->id)
            ->setName($user->name)
            ->setCardId($user->card_id)
            ->setLastName($user->last_name)
            ->setNationalCode($user->national_code);
        return $userAngelBriefInfoDTO;

    }
}