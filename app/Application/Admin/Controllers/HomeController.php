<?php


namespace App\Application\Admin\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
        return view('admin::index');
    }

}