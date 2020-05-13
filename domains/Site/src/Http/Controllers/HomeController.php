<?php


namespace Domains\Site\Http\Controllers;


use App\Http\Controllers\Controller;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Domains\News\Http\Requests\NewsListForAdminRequest;
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

        $subdomain = $this->siteServices->getSubdomain($request->getHttpHost());
        $news = $this->siteServices->getNews($status = 'published', $sort = 'DESC', $subdomain);
        $event = $this->siteServices->getEvent($status = 'published', $sort = 'DESC', $subdomain);
        $sliderFilterDTO = new SliderFilterDTO();
        $sliderFilterDTO->setSliderInputStatus('published')
            ->setLanguage($request->language ?? 'fa')
            ->setPaginationCount(20)
            ->setSort('DESC');
        $sliders = $this->siteServices->getSliderList($sliderFilterDTO, $subdomain);

        $articleFilter = new ArticleFilterDTO();
        $articleFilter->setArticleInputStatus('published')
            ->setLanguage($request->language ?? 'fa')
            ->setSort('DESC');
        $knowledgeArticles = $this->siteServices->getArticleList(
            $articleFilter,
            $subdomain,
            ['article-knowledge']);
        return view('site::' . $request->language . '.index', compact('news', 'event', 'knowledgeArticles','sliders'));
    }

}