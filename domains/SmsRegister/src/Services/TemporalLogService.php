<?php


namespace Domains\SmsRegister\Services;


use Domains\SmsRegister\Repositories\TemporalLogRepository;
use Domains\SmsRegister\Services\Contracts\DTOs\TemporalLogDTO;

/**
 * Class TemporalLogService
 */
class TemporalLogService
{
    /**
     * @var TemporalLogRepository
     */
    private $temporalLogRepository;

    public function __construct(TemporalLogRepository $temporalLogRepository)
    {

        $this->temporalLogRepository = $temporalLogRepository;
    }

    public function log(TemporalLogDTO $temporalLogDTO)
    {
        return $this->temporalLogRepository->createLog($temporalLogDTO);
    }
}