<?php


namespace Domains\Article\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Article\Entities\Article;
use Domains\Article\Http\Presenters\ArticlePaginateInfoPresenter;
use Domains\Article\Http\Requests\CreateArticleRequest;
use Domains\Article\Http\Requests\EditArticleRequest;
use Domains\Article\Http\Requests\ArticleListForAdminRequest;
use Domains\Article\Services\ArticleService;
use Domains\Article\Http\Presenters\ArticleInfoPresenter;
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
}