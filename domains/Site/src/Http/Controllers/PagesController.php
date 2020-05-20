<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Domains\Location\Entities\City;
use Domains\Location\Entities\Province;
use Domains\Media\Http\Presenters\MediaPaginateInfoPresenter;
use Domains\Media\Services\Contracts\DTOs\MediaFilterDTO;
use Domains\Menu\Services\MenusContentService;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\Site\Http\Presenters\CategoryInfoPresenter;
use Domains\Site\Services\SiteServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PagesController extends EhdaBaseController
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

    public function newsListIran(Request $request, CategoryInfoPresenter $categoryInfoPresenter)
    {
        $newsFilterDTO = new NewsFilterDTO();
        $newsFilterDTO->setNewsInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setFirstTitle($request->first_title)
            ->setPaginationCount($request->page_count)
            ->setLanguage($language ?? 'fa');
        $categories = is_array($request->categories) ? $request->categories : ['iran_news'];

        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $news = $this->siteServices->getFilterNews($newsFilterDTO, $subDomain, $categories);

        $categories = $categoryInfoPresenter->transformMany($this->siteServices->getActiveCategoryByParentSlug('iran-news'));
        return view('site::' . $request->language . '.pages.news-list', compact('news', 'categories'));
    }

    public function newsListWorld(Request $request, CategoryInfoPresenter $categoryInfoPresenter)
    {
        $newsFilterDTO = new NewsFilterDTO();
        $newsFilterDTO->setNewsInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setFirstTitle($request->first_title)
            ->setPaginationCount($request->page_count)
            ->setLanguage($language ?? 'fa');
        $categories = is_array($request->categories) ? $request->categories : ['world-news'];

        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $news = $this->siteServices->getFilterNews($newsFilterDTO, $subDomain, $categories);

        $categories = $categoryInfoPresenter->transformMany($this->siteServices->getActiveCategoryByParentSlug('world-news'));
        return view('site::' . $request->language . '.pages.news-list', compact('news', 'categories'));
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

    public function showVideoProfile(Request $request)
    {
        return view('site::' . $request->language . '.pages.dashboard-share');
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

            default:
                abort(404);
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

    public function showDetailEvents($language, $slug)
    {
        if (!$slug) {
            abort(404);
        }
        $content = $this->siteServices->getDetailEvents($slug);
        return view('site::' . $language . '.pages.events-show', compact('content'));
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

    public function eventsListDomain(Request $request, CategoryInfoPresenter $categoryInfoPresenter)
    {
        $eventFilterDTO = new EventFilterDTO();
        $eventFilterDTO->setEventInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setFirstTitle($request->first_title)
            ->setPaginationCount($request->page_count)
            ->setLanguage($language ?? 'fa');
        $categories = is_array($request->categories) ? $request->categories : null;

        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $events = $this->siteServices->getFilterEvent($eventFilterDTO, $subDomain, $categories);
        $categories = $categoryInfoPresenter->transformMany($this->siteServices->getActiveCategoryByType('event'));

        return view('site::' . $request->language . '.pages.events-list', compact('events', 'categories'));
    }

    public function socialUrlFirstCart(Request $request)
    {
        $userData = $this->siteServices->getInfoUserWithUuid($request->uuid);
        return view('site::fa.cards.social', compact('userData'));
    }

    public function socialUrlSecondCart(Request $request)
    {
        $userData = $this->siteServices->getInfoUserWithUuid($request->uuid);
        return view('site::fa.cards.mini', compact('userData'));
    }

    public function printCart(Request $request)
    {
        $userData = $this->siteServices->getInfoUserWithUuid($request->uuid);
        return view('site::fa.cards.print', compact('userData'));
    }

    public function galleryList()
    {
        return view('site::fa.pages.gallery');
    }

    public function galleryListContent(
        $language,
        Request $request,
        MediaPaginateInfoPresenter $mediaPaginateInfoPresenter
    ) {
        $type = $request->type ?? 'voice';
        $mediaFilter = new MediaFilterDTO();
        $mediaFilter->setMediaInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setFirstTitle($request->first_title)
            ->setPaginationCount($request->page_count)
            ->setLanguage($language ?? 'fa')
            ->setType($type);
        $categories = $request->categories;
        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $media = $mediaPaginateInfoPresenter->transform(
            $this->siteServices->getMediaListByType($mediaFilter, $subDomain, $categories)
        );
        return $this->response($media, Response::HTTP_OK);
    }

    public function galleryVideo($language, string $slug, Request $request)
    {
        $type = 'video';

        $mediaFilter = new MediaFilterDTO();
        $mediaFilter->setMediaInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setLanguage($language ?? 'fa')
            ->setType($type);
        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $mediaList = $this->siteServices->getMediaListByType($mediaFilter, $subDomain);
        $mediaDetail = $this->siteServices->getDetailMedia($slug);

        return view('site::fa.pages.gallery-video', compact('mediaList', 'mediaDetail'));
    }

    public function galleryImage($language, string $slug)
    {
        $mediaDetail = $this->siteServices->getDetailMedia($slug);
        return view('site::fa.pages.gallery-images', compact('mediaDetail'));
    }

    public function galleryText($language, string $slug)
    {
        $mediaDetail = $this->siteServices->getDetailMedia($slug);
        return view('site::fa.pages.gallery-text', compact('mediaDetail'));
    }

    public function galleryAudio($language, string $slug, Request $request)
    {
        $type = 'voice';

        $mediaFilter = new MediaFilterDTO();
        $mediaFilter->setMediaInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setLanguage($language ?? 'fa')
            ->setType($type);
        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $mediaList = $this->siteServices->getMediaListByType($mediaFilter, $subDomain);
        $mediaDetail = $this->siteServices->getDetailMedia($slug);

        return view('site::fa.pages.gallery-audio', compact('mediaList', 'mediaDetail'));
    }

    public function textShortLink(string $uuid)
    {
        $mediaDetail = $this->siteServices->getMediaByUuid($uuid);
        return view('site::fa.pages.gallery-text', compact('mediaDetail'));
    }

    public function videoShortLink(string $uuid, Request $request)
    {
        $type = 'video';

        $mediaFilter = new MediaFilterDTO();
        $mediaFilter->setMediaInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setType($type);
        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $mediaList = $this->siteServices->getMediaListByType($mediaFilter, $subDomain);
        $mediaDetail = $this->siteServices->getMediaByUuid($uuid);

        return view('site::fa.pages.gallery-video', compact('mediaList', 'mediaDetail'));

    }

    public function imageShortLink(string $uuid)
    {
        $mediaDetail = $this->siteServices->getMediaByUuid($uuid);
        return view('site::fa.pages.gallery-images', compact('mediaDetail'));
    }

    public function audioShortLink(string $uuid, Request $request)
    {
        $type = 'voice';

        $mediaFilter = new MediaFilterDTO();
        $mediaFilter->setMediaInputStatus('published')
            ->setSort($request->sort ?? 'DESC')
            ->setType($type);
        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $mediaList = $this->siteServices->getMediaListByType($mediaFilter, $subDomain);
        $mediaDetail = $this->siteServices->getMediaByUuid($uuid);

        return view('site::fa.pages.gallery-audio', compact('mediaList', 'mediaDetail'));
    }

    public function showDetailArticle($language, string $slug)
    {

        $menusContent = $this->siteServices->getDetailArticle($slug);
        return view('site::' . $menusContent->getLanguage() . '.pages.page', compact('menusContent'));
    }

    public function map(Request $request)
    {
        return view('site::fa.pages.map');
    }
}