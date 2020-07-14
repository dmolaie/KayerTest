<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return
            $this->collection->map(function ($item) {
                return [
                    'cart_id' => $item->id,
                    'user_id' => $item->user_id,
                    'products' => $item->products->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->name,
                            'title' => $item->title,
                            'description' => $item->description,
                            'image_path' => $item->image,
                            'price' => $item->price,
                        ];
                    }),
                ];
            });
    }
}
