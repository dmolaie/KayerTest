<?php


namespace Domains\Arvanvod\Services\Contracts\DTOs;


use Domains\User\Entities\User;
use phpDocumentor\Reflection\Types\Integer;


/**
 * Class NewsCreateDTO
 */
class ArvanvodListDTO extends ArvanvodBaseSaveDTO
{
    protected  $userId;
    /**
     * @return string|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return ArvanvodCreateDTO
     */
    public function setUserId(?int $userId): ArvanvodListDTO
    {
        $this->userId = $userId;
        return $this;
    }

}