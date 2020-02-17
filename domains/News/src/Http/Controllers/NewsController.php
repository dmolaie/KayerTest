<?php


namespace Domains\News\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\News\Http\Requests\CreateNewsRequest;
use Domains\News\Http\Requests\EditNewsRequest;
use Domains\News\Services\NewsService;
use Domains\News\src\Http\Presenters\NewsInfoPresenter;
use Illuminate\Http\Response;

class NewsController extends EhdaBaseController
{

    /**
     * @var NewsService
     */
    private $newsService;

    public function __construct(NewsService $newsService)
    {

        $this->newsService = $newsService;
    }

    public function createNews(CreateNewsRequest $request, NewsInfoPresenter $newsInfoPresenter)
    {

        $newsCreateDTO = $request->createNewsCreateDTO();
        $newsInfoDTO = $this->newsService->createNews($newsCreateDTO);
        return $this->response(
            $newsInfoPresenter->transform($newsInfoDTO),
            Response::HTTP_CREATED,
            trans('news::response.create_successful')
        );

    }

    public function editNews(EditNewsRequest $request, NewsInfoPresenter $newsInfoPresenter)
    {

        $newsEditDTO = $request->createNewsEditDTO();
        $newsInfoDTO = $this->newsService->editNews($newsEditDTO);
        return $this->response(
            $newsInfoPresenter->transform($newsInfoDTO),
            Response::HTTP_OK,
            trans('news::response.edit_successful')
        );

    }
}