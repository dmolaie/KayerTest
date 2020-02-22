<?php

namespace Domains\Category\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category.
     *
     */
    public function list()
    {
        return true;
    }
}