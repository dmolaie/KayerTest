<?php


namespace Domains\Menu\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Menu\Exceptions\MenuNotFoundErrorException;
use Domains\Menu\Http\Presenters\MenusInfoPresenter;
use Domains\Menu\Http\Requests\CreateMenuRequest;
use Domains\Menu\Http\Requests\DestroyMenuRequest;
use Domains\Menu\Http\Requests\EditMenuRequest;
use Domains\Menu\Services\MenusService;
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

    public function editMenu(EditMenuRequest $request, MenusInfoPresenter $menusInfoPresenter)
    {
        $createMenuDTO = $request->editMenusDTO();
        $menuInfoDTO = $this->menusService->editMenu($createMenuDTO);

        return $this->response(
            $menusInfoPresenter->transform($menuInfoDTO),
            Response::HTTP_OK,
            trans('menus::response.edit_success')
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

    public function destroyMenu(DestroyMenuRequest $request)
    {
        try {
            $this->menusService->destroyEvent($request->menu_id);
            return $this->response([], Response::HTTP_OK, trans('menus::response.success_delete_menu'));
        } catch (MenuNotFoundErrorException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }
}