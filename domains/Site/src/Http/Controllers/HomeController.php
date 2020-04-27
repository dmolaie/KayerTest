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
        $subdomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $news = $this->siteServices->getNews($status = 'published', $sort = 'DESC',$subdomain);
        $event = $this->siteServices->getEvent($status = 'published', $sort = 'DESC',$subdomain);
        return view('site::' . $request->language . '.index', compact('news', 'event'));
    }

}