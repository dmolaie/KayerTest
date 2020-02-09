<?php

namespace Domains\Site\Services;


use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;

class SiteServices
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