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
     * @var string
     */
    protected $link;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $fileId;

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
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return ArvanInfoDTO
     */
    public function setLink(string $link): ArvanInfoDTO
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ArvanInfoDTO
     */
    public function setDescription(string $description): ArvanInfoDTO
    {
        $this->description = $description;
        return $this;
    }

}