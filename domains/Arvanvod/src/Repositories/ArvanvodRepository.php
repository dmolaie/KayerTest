<?php


namespace Domains\Arvanvod\Repositories;

use Domains\Arvanvod\Entities\Arvanvod;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodCreateDTO;

class ArvanvodRepository
{
    protected $entityName = Arvanvod::class;

    public function create(ArvanvodCreateDTO $arvanvodCreateDTO): Arvanvod
    {
        $arvanvod = new  $this->entityName;
        $arvanvod->user_id = $arvanvodCreateDTO->getUserId();
        $arvanvod->link = $arvanvodCreateDTO->getLink();
        $arvanvod->description = $arvanvodCreateDTO->getDescription();
        $arvanvod->save();
        return $arvanvod;
    }



    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function findOrFailSlug(string $slug)
    {
        return $this->entityName::where('slug', '=', $slug)->firstOrFail();
    }

    public function destroyEvent(int $eventId)
    {
        return $this->entityName::where('id', '=', $eventId)->delete();
    }

    public function findOrFailUuid(string $uuid)
    {
        return $this->entityName::where('uuid', '=', $uuid)->firstOrFail();
    }



}