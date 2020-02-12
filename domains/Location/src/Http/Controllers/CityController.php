<?php

namespace Domains\Location\Http\Controllers;

use Illuminate\Http\Response;
use Domains\Location\Services\CityServices;
use App\Http\Controllers\EhdaBaseController;
use Domains\Location\Http\Presenters\CityPresenter;
use Domains\Location\Http\Resources\CityCollection;
use Domains\Location\Http\Requests\CityWithProvinceIdRequest;

class CityController extends EhdaBaseController
{
    /**
     * @var CityServices
     */
    private $cityServices;

    /**
     * CityController constructor.
     * @param CityServices $cityServices
     */
    public function __construct(CityServices $cityServices)
    {
        $this->cityServices = $cityServices;
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
}