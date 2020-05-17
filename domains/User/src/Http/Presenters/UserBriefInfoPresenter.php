<?php


namespace Domains\User\Http\Presenters;


use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserBriefInfoPresenter
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
            'name'             => $userBriefInfoDTO->getName(),
            'card_id'          => $this->getCardId($userBriefInfoDTO),
            'last_name'        => $userBriefInfoDTO->getLastName(),
            'id'               => $userBriefInfoDTO->getId(),
            'national_code'    => $userBriefInfoDTO->getNationalCode(),
            'current_province' => $userBriefInfoDTO->getCurrentProvince(),
            'current_city'     => $userBriefInfoDTO->getCurrentCity(),
            'identity_number'  => $userBriefInfoDTO->getIdentityNumber(),
            'job-title'        => $userBriefInfoDTO->getJobTitle(),
            'roles'            => $userBriefInfoDTO->getRoles(),
            'created_by'       => $userBriefInfoDTO->getCreatedBy(),
            'created_at'       => strtotime($userBriefInfoDTO->getCreatedAt()),
            'updated_at'       => strtotime($userBriefInfoDTO->getUpdatedAt()),
            'file_id'          => $userBriefInfoDTO->getFileId(),
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