<?php


namespace Domains\Arvanvod\Services\Contracts\DTOs\DTOMakers;


use Domains\Arvanvod\Entities\Arvanvod;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Arvanvod\Entities\Event;
use Domains\Event\Services\Contracts\DTOs\EventInfoDTO;

class ArvanvodInfoDTOMaker
{
    public function convertMany($arvanvodCollection)
    {
        return $arvanvodCollection->map(function ($arvanvod) {
            return $this->convert($arvanvod);
        })->toArray();
    }

    public function convert(Arvanvod $arvanvod): ArvanInfoDTO
    {
        $ArvanvodInfoDTO = new ArvanInfoDTO();
        $ArvanvodInfoDTO->setId($arvanvod->id)
            ->setUuid($arvanvod->uuid)
            ->setUserId($arvanvod->user_id)
            ->setFileId($arvanvod->file_id)
            ->setLink($arvanvod->link)
            ->setDescription($arvanvod->description);
        return $ArvanvodInfoDTO;
    }
}