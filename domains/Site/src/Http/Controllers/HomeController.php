<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Domains\Event\Services\EventService;
use Domains\News\Http\Requests\NewsListForAdminRequest;
use Domains\News\Services\NewsService;
use Domains\Site\Services\SiteServices;

class HomeController extends Controller
{
    /**
     * @var NewsService
     */
    private $newsService;
    /**
     * @var EventService
     */
    private $eventService;
    /**
     * @var SiteServices
     */
    private $siteServices;

    public function __construct(SiteServices $siteServices,NewsService $newsService, EventService $eventService)
    {
        $this->newsService = $newsService;
        $this->eventService = $eventService;
        $this->siteServices = $siteServices;
    }

    public function index(NewsListForAdminRequest $request)
    {
        $subdomain = $this->getSubdomain($request->getHttpHost());
        $news = $this->siteServices->getNews($status = 'accept', $sort = 'DESC',$subdomain);
        $event = $this->siteServices->getEvent($status = 'accept', $sort = 'DESC',$slugCategory = 'main-page',$subdomain);
        return view('site::' . $request->language . '.index', compact('news', 'event'));
    }

    private function getSubdomain($url)
    {
        $urlPart = explode('.',$url);
        $categoryList = $this->siteServices->getLocations($urlPart[0]);
        if($categoryList){
            return $categoryList;
        }
        return null;
    }

}