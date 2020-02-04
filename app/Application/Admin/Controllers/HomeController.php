<?php


namespace App\Application\Admin\Controllers;


use App\Domains\Roles\Entities\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show(Roles $role)
    {
        return $role->get();
    }

}