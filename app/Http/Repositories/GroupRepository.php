<?php


namespace App\Http\Repositories;


use App\Entities\Group;

class GroupRepository
{
    protected $entityName = Group::class;

    public function create($data)
    {
        $group = new $this->entityName;
        $group->name = $data["name"];
        $group->title = $data["title"];
        $group->description = $data["description"];
        $group->save();
        return $group;
    }

}