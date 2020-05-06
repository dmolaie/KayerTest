<?php


namespace Domains\Payment\Services;


use Domains\News\Repositories\PaymentRepository;
use Domains\Payment\Services\Contracts\DTOs\DonationCreateDTO;
use Domains\Payment\Services\Contracts\DTOs\DonationInfoDTO;

/**
 * Class PaymentService
 */
class PaymentService
{
    /**
     * @var PaymentRepository
     */
    private $paymentRepository;

    /**
     * PaymentService constructor.
     * @param PaymentRepository $paymentRepository
     */
    public function __construct(PaymentRepository $paymentRepository)
    {

        $this->paymentRepository = $paymentRepository;
    }

    public function CreateDonation(DonationCreateDTO $donationCreateDTO)
    {
        $donationInfoDTO = new DonationInfoDTO();
        $donationData = $this->paymentRepository->create($donationCreateDTO);
        $donationInfoDTO->setNationalCode($donationData->fullname);
        $donationInfoDTO->setPhone($donationData->phone);
        $donationInfoDTO->setAmount($donationData->amount);
        $donationInfoDTO->setNationalCode($donationData->national_code);
        $donationInfoDTO->setType($donationData->type);
        return $donationInfoDTO;
    }


}