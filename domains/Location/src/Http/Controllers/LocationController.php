<?php

namespace Domains\Location\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Location\Http\Presenters\CityPresenter;
use Domains\Location\Http\Presenters\ProvincePresenter;
use Domains\Location\Http\Requests\CityWithProvinceIdRequest;
use Domains\Location\Http\Resources\CityCollection;
use Domains\Location\Services\CityServices;
use Domains\Location\Services\ProvinceService;
use Illuminate\Http\Response;

class LocationController extends EhdaBaseController
{
    /**
     * @var CityServices
     */
    private $cityServices;
    /**
     * @var ProvinceService
     */
    private $provinceService;

    /**
     * LocationController constructor.
     * @param CityServices $cityServices
     * @param ProvinceService $provinceService
     */
    public function __construct(
        CityServices $cityServices,
        ProvinceService $provinceService
    )
    {
        $this->cityServices = $cityServices;
        $this->provinceService = $provinceService;
    }

    /**
     * @param CityPresenter $cityPresenter
     * @return array
     */
    public function getAllCities(CityPresenter $cityPresenter)
    {
        $cities = $this->cityServices->getAll();

        return $this->response(
            $cityPresenter->transformMany($cities),
            Response::HTTP_OK
        );
    }

    public function getCitiesByProvinceId(
        CityWithProvinceIdRequest $request,
        CityPresenter $cityPresenter
    ) {
        $cities = $this->cityServices
            ->getCitiesByProvinceId($request['province_id']);

        return $this->response(
            $cityPresenter->transformMany($cities),
            Response::HTTP_OK
        );
    }

    /**
     * @param ProvincePresenter $provincePresenter
     * @return array
     */
    public function getAllProvinces(ProvincePresenter $provincePresenter)
    {
        $provinces = $this->provinceService->getAll();

        return $this->response(
            $provincePresenter->transformMany($provinces),
            Response::HTTP_OK
        );
    }
}