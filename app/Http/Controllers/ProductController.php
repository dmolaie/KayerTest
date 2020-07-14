<?php


namespace App\Http\Controllers;


use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\Product\CreateProductResource;
use App\Http\Service\ProductService;
use Illuminate\Http\Response;


class ProductController extends BaseController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(CreateProductRequest $createProductRequest)
    {
        $newProducts = $this->productService->create($createProductRequest->all());
        $newProductsResource = new CreateProductResource($newProducts);
        return $this->response(
            $newProductsResource->toArray($newProducts),
            Response::HTTP_CREATED,
            trans('response.product.create_successfully_group')
        );

    }

}