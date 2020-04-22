<?php


namespace Domains\SmsRegister\Repositories;


use Domains\SmsRegister\Entities\TemporalLog;
use Domains\SmsRegister\Services\Contracts\DTOs\TemporalLogDTO;

class TemporalLogRepository
{
    protected $entityName = TemporalLog::class;

    public function createLog(TemporalLogDTO $temporalLogDTO)
    {
        $temporalLog = new $this->entityName;
        $temporalLog->title = $temporalLogDTO->getLogTitle();
        $temporalLog->log_data = $temporalLogDTO->getLogData();
        $temporalLog->save();
        return;
    }

}