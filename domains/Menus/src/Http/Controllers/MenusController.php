<?php


namespace Domains\Menus\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Events\Exceptions\EventNotFoundErrorException;
use Domains\Events\Http\Presenters\EventsInfoPresenter;
use Domains\Events\Http\Presenters\EventsPaginateInfoPresenter;
use Domains\Events\Http\Requests\CreateEventsRequest;
use Domains\Events\Http\Requests\DestroyEventsRequest;
use Domains\Events\Http\Requests\EditEventsRequest;
use Domains\Events\Http\Requests\EventsListForAdminRequest;
use Domains\Events\Services\EventsService;
use Domains\Menus\Http\Requests\CreateMenuRequest;
use Domains\Menus\Services\MenusService;
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

    public function createMenu(CreateMenuRequest $createMenuRequest)
    {

    }
}