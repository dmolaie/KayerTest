<?php


namespace App\Application\Site\Controllers;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('site::index');
    }

    public function news()
    {
        dd('news');
    }

}