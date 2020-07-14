<?php


namespace App\Http\Repositories;


use App\Entities\Cart;

class CartRepository
{
    protected $entityName = Cart::class;

    public function list($data)
    {
        $cart = new $this->entityName;
        return $cart->where("user_id", "=", $data["user_id"])->with("products")->get();
    }

}