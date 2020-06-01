<?php


namespace Domains\Notify\Services\Contracts\DTOs;


/**
 * Class SendSmsDTO
 */
class SendSmsDTO
{
    /**
     * @var string
     */
    protected $mobileNumber;
    /**
     * @var string
     */
    protected $content;
    /**
     * @var array
     */
    protected $channelTypes;

    /**
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     * @return SendSmsDTO
     */
    public function setMobileNumber(string $mobileNumber): SendSmsDTO
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return SendSmsDTO
     */
    public function setContent(string $content): SendSmsDTO
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array
     */
    public function getChannelTypes(): array
    {
        return $this->channelTypes??config('notify.smsChanelTypes');
    }

    /**
     * @param array $channelTypes
     * @return SendSmsDTO
     */
    public function setChannelTypes(array $channelTypes): SendSmsDTO
    {
        $this->channelTypes = $channelTypes;
        return $this;
    }
}