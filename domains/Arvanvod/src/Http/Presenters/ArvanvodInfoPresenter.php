<?php


namespace Domains\Arvanvod\Http\Presenters;


use Domains\Arvanvod\Services\Contracts\DTOs\ArvanInfoDTO;

class ArvanvodInfoPresenter
{
    public function transformMany(array $eventInfoDTOs): array
    {
        return array_map(function ($eventInfoDTO) {
            return $this->transform($eventInfoDTO);
        }, $eventInfoDTOs);
    }

    public function transform(ArvanInfoDTO $arvanInfoDTO)
    {
        return [
            'id' => $arvanInfoDTO->getId(),
            'uuid' => $arvanInfoDTO->getUuid(),
            'user_id' => $arvanInfoDTO->getUserId(),
            'file_id' => $arvanInfoDTO->getFileId(),
            'link' => $arvanInfoDTO->getLink(),
            'description' => $arvanInfoDTO->getDescription()
        ];
    }
}