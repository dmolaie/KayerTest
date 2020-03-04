<?php


namespace Domains\Menu\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Menu\Http\Presenters\MenusInfoPresenter;
use Domains\Menu\Http\Requests\CreateMenuRequest;
use Domains\Menu\Http\Requests\MenuPriorityRequest;
use Domains\Menu\Services\MenusService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class MenusController extends EhdaBaseController
{
    /**
     * @var MenusService
     */
    private $menusService;


    public function __construct(MenusService $menusService)
    {
        $this->menusService = $menusService;
    }

    public function createMenu(CreateMenuRequest $request, MenusInfoPresenter $menusInfoPresenter)
    {
        $createMenuDTO = $request->createMenusDTO();
        $menuInfoDTO = $this->menusService->createMenu($createMenuDTO);
        return $this->response(
            $menusInfoPresenter->transform($menuInfoDTO),
            Response::HTTP_OK,
            trans('menus::response.create_success')
        );
    }

    public function adminList(MenusInfoPresenter $menusInfoPresenter)
    {
        $menus = $this->menusService->getList();
        return $this->response(
            $menusInfoPresenter->transformMany($menus),
            Response::HTTP_OK
        );
    }

    public function activeList(MenusInfoPresenter $menusInfoPresenter)
    {
        $menus = $this->menusService->getList(true);
        return $this->response(
            $menusInfoPresenter->transformMany($menus),
            Response::HTTP_OK
        );
    }

    public function savePriority(MenuPriorityRequest $request, MenusInfoPresenter $menusInfoPresenter)
    {
        try {
            $menus = $this->menusService->savePriority($request->createMenuPriorityDTOs());
            return $this->response(
                $menusInfoPresenter->transformMany($menus),
                Response::HTTP_OK,
                trans('menus::response.save_priority_success')

            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('menus::response.save_priority_fall')
            );
        }

    }
}