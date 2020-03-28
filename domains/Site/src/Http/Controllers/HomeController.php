<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Domains\News\Http\Requests\NewsListForAdminRequest;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\News\Services\NewsService;

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

    public function __construct(NewsService $newsService, NewsFilterDTO $newsFilterDTO)
    {
        $this->newsService = $newsService;
        $this->newsFilterDTO = $newsFilterDTO;
    }

    public function index(NewsListForAdminRequest $request)
    {
        $this->newsFilterDTO->setNewsInputStatus('accept');
        $this->newsFilterDTO->setSort('DESC');
        $news = $this->newsService->filterNews($this->newsFilterDTO)->getItems();
        return view('site::' . $request->language . '.index', compact('news'));
    }

}