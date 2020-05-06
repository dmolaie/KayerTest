<?php


namespace Domains\News\Repositories;

use Domains\Payment\Entities\Donation;
use Domains\Payment\Entities\Payment;
use Domains\Payment\Services\Contracts\DTOs\DonationCreateDTO;

class PaymentRepository
{
    protected $entityName = Payment::class;

    public function create(DonationCreateDTO $donationCreateDTO): Donation
    {
        $donation = new Donation();
        $donation->fullname = $donationCreateDTO->getFullName();
        $donation->national_code = $donationCreateDTO->getNationalCode();
        $donation->phone = $donationCreateDTO->getPhone();
        $donation->amount = $donationCreateDTO->getAmount();
        $donation->type = $donationCreateDTO->getType();
        $donation->save();
        return $donation;
    }


}