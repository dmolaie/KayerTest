<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserBriefInfoDTOMaker
{

    public function convertMany($users)
    {
        return $users->map(function ($user) {
            return $this->convert($user);
        })->toArray();
    }

    public function convert(User $user): UserBriefInfoDTO
    {
        $userBriefInfoDTO = new UserBriefInfoDTO();
        $userBriefInfoDTO->setId($user->id)
            ->setName($user->name)
            ->setCardId($user->card_id)
            ->setLastName($user->last_name)
            ->setNationalCode($user->national_code)
            ->setIdentityNumber($user->identity_number)
            ->setJobTitle($user->job_title)
            ->setCreatedAt(strtotime($user->created_at))
            ->setCurrentCity($user->currentCity?$this->getCurrentCityInfo($user->currentCity):[])
            ->setCurrentProvince($user->currentProvince?$this->getCurrentProvinceInfo($user->currentProvince):[])
            ->setRoles($this->getRoles($user))
            ->setUpdatedAt($user->updated_at)
            ->setCreatedBy($user->createdBy ? [
                'name' => $user->createdBy->name,
                'id'   => $user->createdBy->id,
            ] : null)
            ->setCreatedAt($user->created_at)
            ->setUuid($user->uuid)
            ->setMobile($user->mobile)
            ->setRegisterType($user->register_type)
            ->setFileId( !$user->arvanvod->isEmpty() ? current(current($user->arvanvod))->file_id : null)
            ->setYearDeath( $user->date_death ? $user->date_death : null);
        return $userBriefInfoDTO;

    }

    private function getCurrentCityInfo(City $city)
    {

        return [
            'name' => $city->name,
            'id'   => $city->id,
            'slug' => $city->slug
        ];
    }

    private function getCurrentProvinceInfo(Province $province)
    {

        return [
            'name' => $province->name,
            'id'   => $province->id,
            'slug' => $province->slug
        ];
    }

    private function getRoles(User $user)
    {
        return $user->roles->map(function ($role) {

            return [
                'name'   => $role->name,
                'id'     => $role->id,
                'label'  => $role->label,
                'type'   => $role->type,
                'status' => $role->pivot->status
            ];
        })->toArray();
    }
}