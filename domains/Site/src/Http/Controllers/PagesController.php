<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function history(Request $request)
    {
        return view('site::' . $request->language . '.pages.history');
    }

    public function structureAndOrganization(Request $request)
    {
        return view('site::' . $request->language . '.pages.structure-and-organization');
    }

    public function newsList(Request $request)
    {
        return view('site::' . $request->language . '.pages.news-list');
    }

    public function interactions(Request $request)
    {
        return view('site::' . $request->language . '.pages.interactions-show');
    }

    public function foundations(Request $request)
    {
        return view('site::' . $request->language . '.pages.foundations');
    }

    public function missionAndVision(Request $request)
    {
        return view('site::' . $request->language . '.pages.mission-and-vision');
    }

    public function donationAndCard(Request $request)
    {
        $data['gender'] = array_keys(config('user.user_genders'));
        $data['day'] = range(1, 30);
        $data['month'] = config('user.month');
        $data['year'] = range(1330, 1381);
        $data['state'] = Province::get(['id', 'name'])->toArray();
        $data['city'] = City::get(['id', 'name'])->toArray();
        $data['education_degree'] = config('user.education_degree');
        return view('site::' . $request->language . '.pages.donation-card', compact('data'));
    }

    public function legaterVolunteers(Request $request)
    {
        return view('site::' . $request->language . '.pages.volunteers');
    }

    public function legaterVolunteersFinalStep(Request $request)
    {
        if (!$request->session()->get('national_code') && !$request->session()->get('name') &&
            !$request->session()->get('last_name') && !$request->session()->get('mobile') &&
            !$request->session()->get('email')) {
            return redirect()->route('page.volunteers', config('app.locale'));
        }
        $data['dataSessionUser'] = $request->session();
        $data['day'] = range(1, 30);
        $data['month'] = config('user.month');
        $data['year'] = range(1330, 1381);
        $data['state'] = Province::get(['id', 'name'])->toArray();
        $data['city'] = City::get(['id', 'name'])->toArray();
        $data['education_degree'] = config('user.education_degree');
        $data['know_community_by'] = config('user.know_community_by');
        $data['user_marital_statuses'] = config('user.user_marital_statuses');
        $data['field_of_activities'] = config('user.field_of_activities');
        return view('site::' . $request->language . '.pages.volunteers-final-step', compact('data'));
    }
}