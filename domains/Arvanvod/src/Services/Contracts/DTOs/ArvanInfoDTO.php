<?php


namespace Domains\Arvanvod\Services\Contracts\DTOs;


/**
 * Class EventInfoDTO
 */
class ArvanInfoDTO
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var null|string
     */
    protected $link;

    /**
     * @var null|string
     */
    protected $description;

    /**
     * @var string
     */
    protected $fileId;

    /**
     * @var string
     */
    protected $date;

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return ArvanInfoDTO
     */
    public function setDate(string $date): ArvanInfoDTO
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return ArvanInfoDTO
     */
    public function setFileId(string $fileId): ArvanInfoDTO
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ArvanInfoDTO
     */
    public function setId(int $id): ArvanInfoDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return ArvanInfoDTO
     */
    public function setUuid(string $uuid): ArvanInfoDTO
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return ArvanInfoDTO
     */
    public function setUserId(string $userId): ArvanInfoDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param null|string $link
     * @return ArvanInfoDTO
     */
    public function setLink($link): ArvanInfoDTO
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return ArvanInfoDTO
     */
    public function setDescription($description): ArvanInfoDTO
    {
        $this->description = $description;
        return $this;
    }

}