<?php


namespace App\Application\Site\Controllers;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('site::fa.index');
    }

}