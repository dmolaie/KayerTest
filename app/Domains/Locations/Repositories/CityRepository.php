<?php

namespace App\Domains\Locations\Repositories;

use App\Domains\Locations\Entities\City;
use App\Infrastructure\Repositories\BaseEloquentRepository;

class CityRepository extends BaseEloquentRepository
{
    protected $entityName = City::class;
}