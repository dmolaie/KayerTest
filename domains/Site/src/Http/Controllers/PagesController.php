<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Domains\Menu\Services\MenusContentService;
use Domains\News\Services\NewsService;
use Domains\Site\Services\SiteServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    protected $siteServices;
    public function __construct(SiteServices $siteServices)
    {
        $this->siteServices = $siteServices;
    }

    public function history(Request $request)
    {
        return view('site::' . $request->language . '.pages.history');
    }

    public function structureAndOrganization(Request $request)
    {
        return view('site::' . $request->language . '.pages.structure-and-organization');
    }

    public function newsListIran(Request $request)
    {
        $news = $this->siteServices->getFilterNews('iran-news')->getItems();
        $categories = $this->siteServices->getActiveCategoryByType('news'); 
        return view('site::' . $request->language . '.pages.news-list',compact('news','categories'));
    }

    public function newsListWorld(Request $request)
    {
        $news = $this->siteServices->getFilterNews('world-news')->getItems();
        return view('site::' . $request->language . '.pages.news-list' ,compact('news'));
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
        if (!Auth::check() && !$request->session()->get('national_code') && !$request->session()->get('name') &&
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

    public function clientProfile(Request $request)
    {
        return view('site::' . $request->language . '.pages.dashboard');
    }

    public function editClientProfile(Request $request)
    {
        $data['gender'] = array_keys(config('user.user_genders'));
        $data['day'] = range(1, 30);
        $data['month'] = config('user.month');
        $data['year'] = range(1330, 1381);
        $data['state'] = Province::get(['id', 'name'])->toArray();
        $data['city'] = City::get(['id', 'name'])->toArray();
        $data['education_degree'] = config('user.education_degree');
        return view('site::' . $request->language . '.pages.dashboard-edit', compact('data'));
    }

    public function pages($language, $slug, MenusContentService $menusContentService)
    {
        $menuTyps = config('menus.menus_type');

        if (!$slug) {
            abort(404);
        }

        $menusContentService = $menusContentService->getPageContent($slug);
        $menusContent = $menusContentService->getContentObject();

        switch ($menusContentService->getType()) {

            case $menuTyps['article_type'] :
                return view('site::' . $language . '.pages.page', compact('menusContent'));

            case $menuTyps['list_article_type'] :
                return view('site::' . $language . '.pages.article-list', compact('menusContent'));

            case $menuTyps['list_news_type'] :
                return view('site::' . $language . '.pages.news-list', compact('menusContent'));

            case $menuTyps['list_event_type'] :
                return view('site::' . $language . '.pages.event-list', compact('menusContent'));

            default: abort(404);
        }
    }

    public function showDetailNews($language, $slug)
    {
        if (!$slug) {
            abort(404);
        }
        $content = $this->siteServices->getDetailNews($slug);
        return view('site::' . $language . '.pages.news-show', compact('content'));

    }
}