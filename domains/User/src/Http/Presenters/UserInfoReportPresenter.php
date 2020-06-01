<?php


namespace Domains\User\Http\Presenters;

use Domains\User\Services\Contracts\DTOs\UserInfoReportDTO;

class UserInfoReportPresenter
{
    public function transformMany(array $newsInfoDTOs): array
    {
        return array_map(function ($newsInfoDTO) {
            return $this->transform($newsInfoDTO);
        }, $newsInfoDTOs);
    }

    public function transform(UserInfoReportDTO $userInfoReportDTO)
    {
        return [
            'national_code' => $userInfoReportDTO->getNationalCode(),
            'name'          => $userInfoReportDTO->getName(),
            'last_name'     => $userInfoReportDTO->getLastName(),
            'date_of_birth' => $userInfoReportDTO->getDateOfBirth(),
            'mobile'        => $userInfoReportDTO->getMobile(),
            'email'         => $userInfoReportDTO->getEmail(),
            'register_type' => trans('user::baseLang.register_type.' . $userInfoReportDTO->getRegisterType()),
        ];
    }

}