<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('site::'.$request->language.'.index');
    }

}