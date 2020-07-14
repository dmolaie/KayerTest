<?php


namespace App\Http\Controllers;


use App\Http\Requests\Cart\ListCartRequest;
use App\Http\Resources\Cart\CartListCollection;
use App\Http\Service\CartService;
use Illuminate\Http\Response;


class CartController extends BaseController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function listCart(ListCartRequest $listCartRequest)
    {
        $listProductCart = $this->cartService->list($listCartRequest->all());
        $listProductsResource = new CartListCollection($listProductCart);
        return $this->response(
            (array)$listProductsResource->toArray($listProductCart),
            Response::HTTP_OK,
            trans('response.cart.success_list')
        );

    }

}