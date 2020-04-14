<?php


namespace Domains\User\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserRoleInfoDTO;

class UserRoleInfoPresenter
{
    public function transformMany($userRoleInfoDTOs)
    {
        return array_map(function ($userRoleInfoDTO) {
            return $this->transform($userRoleInfoDTO);
        }, $userRoleInfoDTOs);
    }

    public function transform(UserRoleInfoDTO $userRoleInfoDTO)
    {
        return [
            'name'   => $userRoleInfoDTO->getName(),
            'id'     => $userRoleInfoDTO->getId(),
            'status' => $userRoleInfoDTO->getStatus(),
            'label'  => $userRoleInfoDTO->getLabel(),
            'type'   => $userRoleInfoDTO->getType(),
        ];
    }


}