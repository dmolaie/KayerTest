<?php


namespace Domains\Category\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Category\Http\Presenters\CategoryInfoPresenter;
use Domains\Category\Http\Presenters\CategoryListPresenter;
use Domains\Category\Http\Requests\CategoryByTypeRequest;
use Domains\Category\Http\Requests\CreateCategoryRequest;
use Domains\Category\Services\CategoryService;
use Illuminate\Http\Response;

class CategoryController extends EhdaBaseController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {

        $this->categoryService = $categoryService;
    }

    public function getCategoryByType(
        CategoryByTypeRequest $request,
        CategoryListPresenter $categoryListPresenter
    ) {
        $categoryDTOs = $this->categoryService->getCategoryByType($request['category_type']);
        return $this->response(
            $categoryListPresenter->transformMany($categoryDTOs),
            Response::HTTP_OK
        );
    }

    public function createCategory(CreateCategoryRequest $request)
    {
        $this->categoryService->createCategory($request->createCategoryCreateDTO());
        return $this->response(
            [],
            Response::HTTP_CREATED,
            trans('category::response.successful_create')
        );
    }

    public function getActiveCategoryByType(
        CategoryByTypeRequest $request,
        CategoryListPresenter $categoryListPresenter
    ) {
        $categoryDTOs = $this->categoryService->getActiveCategoryByType($request['category_type']);
        return $this->response(
            $categoryListPresenter->transformMany($categoryDTOs),
            Response::HTTP_OK
        );
    }
    public function CategoryListByType(
        CategoryByTypeRequest $request,
        CategoryInfoPresenter $categoryInfoPresenter
    ) {
        $categoryDTOs = $this->categoryService->getActiveCategoryByType($request['category_type']);
        return $this->response(
            $categoryInfoPresenter->transformMany($categoryDTOs),
            Response::HTTP_OK
        );
    }
}