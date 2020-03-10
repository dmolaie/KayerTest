<?php

namespace App\Http\Middleware;

use Closure;
use Domains\Menu\Services\MenusService;

class DataNecessaryInBlades
{
    private $menuService;
    public function __construct(MenusService $menusService)
    {
        $this->menuService = $menusService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $listOfMenu = $this->menuService->getListSite();
        \View::share('menus', $listOfMenu);
        return $next($request);
    }
}
