<?php


namespace Domains\Admin\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Illuminate\Support\Facades\Auth;

class HomeController extends EhdaBaseController
{
    public function show()
    {
        return view('admin::index');
    }

    public function list()
    {
        return \auth()->user();
    }

}