<?php


namespace Domains\User\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserBaseProfileInfo
{
    public function transformMany($userBriefInfoDTOs)
    {
        return array_map(function ($userBriefInfoDTO) {
            return $this->transform($userBriefInfoDTO);
        }, $userBriefInfoDTOs);
    }

    public function transform(UserBriefInfoDTO $userBriefInfoDTO)
    {
        return [
            'name'          => $userBriefInfoDTO->getName(),
            'card_id'       => $this->getCardId($userBriefInfoDTO),
            'last_name'     => $userBriefInfoDTO->getLastName(),
            'id'            => $userBriefInfoDTO->getId(),
            'national_code' => $userBriefInfoDTO->getNationalCode(),
            'roles'         => $userBriefInfoDTO->getRoles()
        ];
    }

    private function getCardId(UserBriefInfoDTO $userBriefInfoDTO)
    {
        $roleIds = collect($userBriefInfoDTO->getRoles())->pluck('type')->toArray();
        if (in_array(config('user.client_role_type'), $roleIds)) {
            return $userBriefInfoDTO->getCardId();
        }
        return null;
    }

}