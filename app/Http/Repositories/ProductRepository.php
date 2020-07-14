<?php


namespace App\Http\Repositories;


use App\Entities\Product;
use App\Entities\Stock;

class ProductRepository
{
    protected $entityName = Product::class;

    public function create($data)
    {
        $product = new $this->entityName;
        $product->name = $data["name"];
        $product->title = $data["title"];
        $product->description = $data["description"];
        $product->price = $data["price"];
        $product->image = $data["image_path"];
        $product->save();
        $stock = new Stock();
        $checkStock = $stock->where("product_id")->first();
        if (!$checkStock) {
            $stock->create([
                "product_id" => $product->id,
                "count_product" => $data["count_product"]
            ]);
        }
        $product->groups()->attach($data["group_id"]);
        return $product;
    }

}