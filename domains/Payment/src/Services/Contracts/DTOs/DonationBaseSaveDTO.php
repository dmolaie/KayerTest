<?php

namespace Domains\Donation\Services\Contracts\DTOs;


class DonationBaseSaveDTO
{
    /**
     * @var null|string
     */
    protected $fullName;

    /**
     * @var null|string
     */
    protected $phone;

    /**
     * @var null|integer
     */
    protected $nationalCode;

    /**
     * @var null|integer
     */
    protected $type;

    /**
     * @var null|integer
     */
    protected $amount;

}