<?php

namespace App\Http\Middleware;

use Closure;
use Domains\Location\Services\ProvinceService;
use Domains\Menu\Services\MenusService;

class DataNecessaryInBlades
{
    private $menuService;
    /**
     * @var ProvinceService
     */
    private $provinceService;

    public function __construct(MenusService $menusService,ProvinceService $provinceService)
    {
        $this->menuService = $menusService;
        $this->provinceService = $provinceService;
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
        $listOfMenu = $this->menuService->getListSite(true);
        $listOfProvince = $this->provinceService->getAll(true);
        $language = request()->language;
        \View::share(['menus' => $listOfMenu, 'provinces' => $listOfProvince, 'language' => $language]);
        return $next($request);
    }
}
