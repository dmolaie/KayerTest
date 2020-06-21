<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Domains\News\Http\Requests\NewsListForAdminRequest;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\Site\Services\SiteServices;
use Domains\Slider\Services\Contracts\DTOs\SliderFilterDTO;

class HomeController extends Controller
{
    /**
     * @var SiteServices
     */
    private $siteServices;

    public function __construct(SiteServices $siteServices)
    {
        $this->siteServices = $siteServices;
    }

    public function index(NewsListForAdminRequest $request)
    {

        $subDomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $language = $request->language ?? 'fa';
        $sort = 'DESC';
        $pageCount = 20;
        $newsFilterDTO = new NewsFilterDTO();
        $newsFilterDTO->setNewsInputStatus('published')
            ->setSort($sort)
            ->setPaginationCount($pageCount)
            ->setLanguage($language);
        $categories = ['world-special-news', 'iran-special-news'];

        $news = $this->siteServices->getFilterNews($newsFilterDTO, $subDomain, $categories)->items();
        $event = $this->siteServices->getEvent($status = 'published', $sort = $sort, $subDomain);
        $sliderFilterDTO = new SliderFilterDTO();
        $sliderFilterDTO->setSliderInputStatus('published')
            ->setLanguage($language)
            ->setPaginationCount($pageCount)
            ->setSort($sort);
        $sliders = $this->siteServices->getSliderList($sliderFilterDTO, $subDomain);

        $articleFilter = new ArticleFilterDTO();
        $articleFilter->setArticleInputStatus('published')
            ->setLanguage($language)
            ->setSort($sort);
        $knowledgeArticles = $this->siteServices->getArticleList(
            $articleFilter,
            $subDomain,
            ['article-knowledge']);
        return view('site::' . $language . '.index', compact('news', 'event', 'knowledgeArticles', 'sliders'));
    }

}