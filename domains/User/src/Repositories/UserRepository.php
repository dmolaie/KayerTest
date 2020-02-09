<?php


namespace Domains\User\Repositories;


use App\Infrastructure\Repositories\BaseEloquentRepository;
use Domains\User\Entities\User;

class UserRepository extends BaseEloquentRepository
{
    protected $entityName = User::class;
}