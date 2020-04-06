<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use ArieTimmerman\Laravel\URLShortener\URLShortener;
use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Domains\Menu\Services\MenusContentService;
use Domains\News\Services\NewsService;
use Domains\Site\Http\Presenters\CategoryInfoPresenter;
use Domains\Site\Services\SiteServices;
use Gallib\ShortUrl\Facades\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    static function getNewsCategories($categories, $gap = 0)
    {
        return array_reduce($categories, function ($flatArray, $item) use ($gap) {
            $item->gap = 16 * $gap;
            ( !empty($item->getChildren()) ) ? (
                array_push($flatArray, $item, ...self::getNewsCategories($item->getChildren()->all(), $gap + 1))
            ) : (
                array_push($flatArray, $item)
            );
            return $flatArray;
        }, []);
    }

    public function newsListIran(Request $request,CategoryInfoPresenter $categoryInfoPresenter)
    {
        $news = $this->siteServices->getFilterNews('iran-news')->getItems();
        $categories = $this->siteServices->getActiveCategoryByType('news');
        $categories = self::getNewsCategories($categories);
//        $categories = $categoryInfoPresenter->transformMany(
//            $this->siteServices->getActiveCategoryByType('news'));
        return view('site::' . $request->language . '.pages.news-list',compact('news','categories'));
    }

    public function newsListWorld(Request $request, CategoryInfoPresenter $categoryInfoPresenter)
    {
        $news = $this->siteServices->getFilterNews('world-news')->getItems();
        $categories = $this->siteServices->getActiveCategoryByType('news');
        $categories = self::getNewsCategories($categories);
//        $categories = $categoryInfoPresenter->transformMany(
//            $this->siteServices->getActiveCategoryByType('news'));
        return view('site::' . $request->language . '.pages.news-list' ,compact('news','categories'));
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

    public function newsShortLink($uuid)
    {
        if (!$uuid) {
            abort(404);
        }
        $content = $this->siteServices->getNewsWithUuid($uuid);
        return view('site::' . $content->getLanguage() . '.pages.news-show', compact('content'));
    }

    public function eventShortLink($uuid)
    {
        if (!$uuid) {
            abort(404);
        }
        $content = $this->siteServices->getEventsWithUuid($uuid);
        return view('site::' . $content->getLanguage() . '.pages.event-show', compact('content'));
    }

    public function articleShortLink($uuid)
    {
        if (!$uuid) {
            abort(404);
        }
        $menusContent = $this->siteServices->getArticleWithUuid($uuid);
        return view('site::' . $menusContent->getLanguage() . '.pages.page', compact('menusContent'));
    }
}