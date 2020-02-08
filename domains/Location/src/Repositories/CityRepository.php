<?php

namespace Domains\Location\Repositories;

use Domains\Location\Entities\City;
use App\Infrastructure\Repositories\BaseEloquentRepository;

class CityRepository extends BaseEloquentRepository
{
    protected $entityName = City::class;
}