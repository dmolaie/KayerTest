<?php


namespace Domains\User\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\AngelUserBriefInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserAngelBriefInfoPresenter
{
    public function transformMany($userBriefInfoDTOs)
    {
        return array_map(function ($userBriefInfoDTO) {
            return $this->transform($userBriefInfoDTO);
        }, $userBriefInfoDTOs);
    }

    public function transform(AngelUserBriefInfoDTO $angelUserBriefInfoDTO)
    {
        return [
            'name'             => $angelUserBriefInfoDTO->getName(),
            'last_name'        => $angelUserBriefInfoDTO->getLastName(),
            'id'               => $angelUserBriefInfoDTO->getId(),
            'national_code'    => $angelUserBriefInfoDTO->getNationalCode(),
            'year_death'       => $angelUserBriefInfoDTO->getYearDeath(),
        ];
    }

}