<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Cassandra\Uuid;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Domains\Event\Services\EventService;
use Domains\News\Http\Requests\NewsListForAdminRequest;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\News\Services\NewsService;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * @var NewsFilterDTO
     */
    private $newsFilterDTO;
    /**
     * @var EventService
     */
    private $eventService;
    /**
     * @var EventFilterDTO
     */
    private $eventFilterDTO;

    public function __construct(NewsService $newsService, NewsFilterDTO $newsFilterDTO, EventService $eventService, EventFilterDTO $eventFilterDTO)
    {
        $this->newsService = $newsService;
        $this->newsFilterDTO = $newsFilterDTO;
        $this->eventService = $eventService;
        $this->eventFilterDTO = $eventFilterDTO;
    }

    public function index(NewsListForAdminRequest $request)
    {
        $this->newsFilterDTO->setNewsInputStatus('accept');
        $this->newsFilterDTO->setSort('DESC');
        $this->eventFilterDTO->setEventInputStatus('accept');
        $this->eventFilterDTO->setSort('DESC');
        $news = $this->newsService->filterNews($this->newsFilterDTO)->getItems();
        $event = $this->eventService->filterEvent($this->eventFilterDTO)->getItems();
        return view('site::' . $request->language . '.index', compact('news', 'event'));
    }

}