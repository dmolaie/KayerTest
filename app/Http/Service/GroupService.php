<?php


namespace App\Http\Service;


use App\Http\Repositories\GroupRepository;

class GroupService
{
    private $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function create($data)
    {
        return $this->groupRepository->create($data);
    }

}