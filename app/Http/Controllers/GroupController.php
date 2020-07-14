<?php


namespace App\Http\Controllers;


use App\Http\Requests\Group\CreateGroupRequest;
use App\Http\Resources\Group\CreateGroupResource;
use App\Http\Service\GroupService;
use Illuminate\Http\Response;


class GroupController extends BaseController
{
    private $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function create(CreateGroupRequest $createGroup)
    {
        $newGroup = $this->groupService->create($createGroup->all());
        $newGroupResource = new CreateGroupResource($newGroup);
        return $this->response(
            $newGroupResource->toArray($newGroup),
            Response::HTTP_CREATED,
            trans('response.group.create_successfully_group')
        );

    }

}