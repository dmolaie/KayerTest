<?php


namespace Domains\Category\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Category\Http\Presenters\CategoryListPresenter;
use Domains\Category\Http\Requests\CategoryByTypeRequest;
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

    public function getCategoryByType(CategoryByTypeRequest $request, CategoryListPresenter $categoryListPresenter)
    {
        $categoryDTOs = $this->categoryService->getCategoryByType($request['category_type']);
        return $this->response(
            $categoryListPresenter->transformMany($categoryDTOs),
            Response::HTTP_OK
        );
    }

}