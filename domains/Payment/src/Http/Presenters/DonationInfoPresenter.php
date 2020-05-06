<?php


namespace Domains\Payment\Http\Presenters;


use Domains\Payment\Services\Contracts\DTOs\DonationInfoDTO;

class DonationInfoPresenter
{
    public function transformMany(array $donationInfoDTOs): array
    {
        return array_map(function ($donationInfoDTO) {
            return $this->transform($donationInfoDTO);
        }, $donationInfoDTOs);
    }

    public function transform(DonationInfoDTO $donationInfoDTO)
    {
        return [
            'fullname'        => $donationInfoDTO->getFullName(),
            'national_code'   => $donationInfoDTO->getNationalCode(),
            'phone'           => $donationInfoDTO->getPhone(),
            'type'            => $donationInfoDTO->getType(),
            'amount'          => $donationInfoDTO->getAmount(),
        ];
    }

}