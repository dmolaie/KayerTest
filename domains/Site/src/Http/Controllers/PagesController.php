<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function history(Request $request)
    {
        return view('site::'.$request->language.'.pages.history');
    }

    public function structureAndOrganization(Request $request)
    {
        return view('site::'.$request->language.'.pages.structure-and-organization');
    }

    public function newsList(Request $request)
    {
        return view('site::'.$request->language.'.pages.news-list');
    }

    public function interactions(Request $request)
    {
        return view('site::'.$request->language.'.pages.interactions-list');
    }

    public function foundations(Request $request)
    {
        return view('site::'.$request->language.'.pages.foundations');
    }

    public function missionAndVision(Request $request)
    {
        return view('site::'.$request->language.'.pages.mission-and-vision');
    }

}