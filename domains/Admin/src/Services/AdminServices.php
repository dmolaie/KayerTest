<?php

namespace Domains\Admin\Services;


use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;

class AdminServices
{
    /**
     */
    private $cityRepository;
    /**
     */
    private $cityTransformer;

    public function __construct()
    {
    }
    public function getAll()
    {
    }

    public function find(int $id)
    {
    }
}