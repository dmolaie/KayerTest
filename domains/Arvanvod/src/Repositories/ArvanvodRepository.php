<?php


namespace Domains\Arvanvod\Repositories;

use Domains\Arvanvod\Entities\Arvanvod;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodCreateDTO;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodListDTO;

class ArvanvodRepository
{
    protected $entityName = Arvanvod::class;

    public function create(ArvanvodCreateDTO $arvanvodCreateDTO): Arvanvod
    {
        $arvanvod = new  $this->entityName;
        $arvanvod->user_id = $arvanvodCreateDTO->getUserId();
        $arvanvod->file_id = $arvanvodCreateDTO->getFileId();
        $arvanvod->link = $arvanvodCreateDTO->getLink();
        $arvanvod->description = $arvanvodCreateDTO->getDescription();
        $arvanvod->save();
        return $arvanvod;
    }

    public function findOrFailByUserId(ArvanvodListDTO $arvanvodListDTO)
    {
        return $this->entityName::where('user_id','=',$arvanvodListDTO->getUserId())->firstOrFail();
    }

    public function destroyArvanvod(ArvanvodListDTO $arvanvodListDTO)
    {
        return $this->entityName::where('user_id', '=', $arvanvodListDTO->getUserId())->delete();
    }

}