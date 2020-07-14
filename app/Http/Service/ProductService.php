<?php


namespace App\Http\Service;


use App\Http\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create($data)
    {
        $attachmentService = new AttachmentService();
        $path = $attachmentService->uploadImages($data);
        $data['image_path'] = $path;
        return $this->productRepository->create($data);
    }

}