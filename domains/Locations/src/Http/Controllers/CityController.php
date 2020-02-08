<?php

namespace Domains\Locations\Http\Controllers;

use App\Http\Controllers\Controller;
use Domains\Locations\Http\Resources\CityCollection;
use Domains\Locations\Services\CityServices;

class CityController extends Controller
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
     * @return array
     */
    public function getAllCity()
    {
        $cities = $this->cityServices->getAll();
        $cityTransform = new CityCollection($cities);
        return $cityTransform;
    }
}