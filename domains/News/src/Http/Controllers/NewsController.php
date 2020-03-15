<?php


namespace Domains\News\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\News\Exceptions\NewsNotFoundException;
use Domains\News\Http\Presenters\NewsInfoPresenter;
use Domains\News\Http\Presenters\NewsPaginateInfoPresenter;
use Domains\News\Http\Requests\ChangeNewsStatusRequest;
use Domains\News\Http\Requests\CreateNewsRequest;
use Domains\News\Http\Requests\EditNewsRequest;
use Domains\News\Http\Requests\NewsListForAdminRequest;
use Domains\News\Services\NewsService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function getListForAdmin(
        NewsListForAdminRequest $request,
        NewsPaginateInfoPresenter $newsPaginateInfoPresenter
    ) {
        $newsPaginateInfoDTO = $this->newsService->filterNews($request->createNewsFilterDTO());
        return $this->response(
            $newsPaginateInfoPresenter->transform($newsPaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function deleteNews(int $newsId)
    {
        try {
            $this->newsService->destroyNews($newsId);
            return $this->response([], Response::HTTP_OK, trans('news::response.success_delete_news'));
        } catch (NewsNotFoundException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('news::response.news_not_found'));
        }
    }

    public function changeNewsStatus(ChangeNewsStatusRequest $request, NewsInfoPresenter $newsInfoPresenter)
    {
        try {
            $newsInfoDTO = $this->newsService->changeStatus(
                $request->news_id,
                $request->status
            );
            return $this->response(
                $newsInfoPresenter->transform($newsInfoDTO),
                Response::HTTP_OK,
                trans('news::response.edit_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('news::response.news_not_found')
            );
        }

    }
}