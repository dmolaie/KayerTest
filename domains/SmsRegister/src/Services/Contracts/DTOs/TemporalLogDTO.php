<?php


namespace Domains\SmsRegister\Services\Contracts\DTOs;


/**
 * Class TemporalLogDTO
 */
class TemporalLogDTO
{
    /**
     * @var string
     */
    protected $logTitle;
    /**
     * @var array
     */
    protected $logData;

    /**
     * @return string
     */
    public function getLogTitle(): string
    {
        return $this->logTitle;
    }

    /**
     * @param string $logTitle
     * @return TemporalLogDTO
     */
    public function setLogTitle(string $logTitle): TemporalLogDTO
    {
        $this->logTitle = $logTitle;
        return $this;
    }

    /**
     * @return array
     */
    public function getLogData(): array
    {
        return $this->logData;
    }

    /**
     * @param array $logData
     * @return TemporalLogDTO
     */
    public function setLogData(array $logData): TemporalLogDTO
    {
        $this->logData = $logData;
        return $this;
    }

}