<?php


namespace App\Http\Service;


use App\Http\Repositories\CartRepository;
use App\Http\Repositories\ProductRepository;

class CartService
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function list($data)
    {
        return $this->cartRepository->list($data);
    }

}