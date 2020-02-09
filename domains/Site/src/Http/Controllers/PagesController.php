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

}