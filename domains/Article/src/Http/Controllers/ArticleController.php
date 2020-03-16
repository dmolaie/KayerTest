<?php


namespace Domains\Article\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Article\Exceptions\ArticleNotFoundException;
use Domains\Article\Http\Presenters\ArticleInfoPresenter;
use Domains\Article\Http\Presenters\ArticlePaginateInfoPresenter;
use Domains\Article\Http\Requests\ArticleListForAdminRequest;
use Domains\Article\Http\Requests\ChangeArticleStatusRequest;
use Domains\Article\Http\Requests\CreateArticleRequest;
use Domains\Article\Http\Requests\DestroyArticleRequest;
use Domains\Article\Http\Requests\EditArticleRequest;
use Domains\Article\Services\ArticleService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class ArticleController extends EhdaBaseController
{

    /**
     * @var ArticleService
     */
    private $articleService;

    public function __construct(ArticleService $articleService)
    {

        $this->articleService = $articleService;
    }

    public function createArticle(CreateArticleRequest $request, ArticleInfoPresenter $articleInfoPresenter)
    {

        $articleCreateDTO = $request->createArticleCreateDTO();
        $articleInfoDTO = $this->articleService->createArticle($articleCreateDTO);
        return $this->response(
            $articleInfoPresenter->transform($articleInfoDTO),
            Response::HTTP_CREATED,
            trans('article::response.create_successful')
        );

    }

    public function editArticle(EditArticleRequest $request, ArticleInfoPresenter $articleInfoPresenter)
    {
        $articleEditDTO = $request->createArticleEditDTO();
        $articleInfoDTO = $this->articleService->editArticle($articleEditDTO);
        return $this->response(
            $articleInfoPresenter->transform($articleInfoDTO),
            Response::HTTP_OK,
            trans('article::response.edit_successful')
        );
    }

    public function getListForAdmin(
        ArticleListForAdminRequest $request,
        ArticlePaginateInfoPresenter $articlePaginateInfoPresenter
    ) {
        $articlePaginateInfoDTO = $this->articleService->filterArticle($request->createArticleFilterDTO());
        return $this->response(
            $articlePaginateInfoPresenter->transform($articlePaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function deleteArticle(int $articleId)
    {
        try {
            $this->articleService->destroyArticle($articleId);
            return $this->response([], Response::HTTP_OK, trans('article::response.success_delete_article'));
        } catch (ArticleNotFoundException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('article::response.article_not_found'));
        }
    }

    public function changeArticleStatus(ChangeArticleStatusRequest $request, ArticleInfoPresenter $articleInfoPresenter)
    {
        try {
            $articleInfoDTO = $this->articleService->changeStatus(
                $request->article_id,
                $request->status
            );

            return $this->response(
                $articleInfoPresenter->transform($articleInfoDTO),
                Response::HTTP_OK,
                trans('article::response.edit_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('article::response.article_not_found')
            );
        }

    }
}