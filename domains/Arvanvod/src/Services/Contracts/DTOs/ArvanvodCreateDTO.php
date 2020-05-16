<?php


namespace Domains\Arvanvod\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class ArvanvodCreateDTO extends ArvanvodBaseSaveDTO
{

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param mixed $fileId
     * @return ArvanvodCreateDTO
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return ArvanvodCreateDTO
     */
    public function setUserId(?string $userId): ArvanvodCreateDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return ArvanvodCreateDTO
     */
    public function setLink(?string $link): ArvanvodCreateDTO
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return ArvanvodCreateDTO
     */
    public function setDescription(?string $description): ArvanvodCreateDTO
    {
        $this->description = $description;
        return $this;
    }

}