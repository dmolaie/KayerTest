<?php

namespace Domains\Locations\Repositories;

use Domains\Locations\Entities\City;
use App\Infrastructure\Repositories\BaseEloquentRepository;

class CityRepository extends BaseEloquentRepository
{
    protected $entityName = City::class;
}