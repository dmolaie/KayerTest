<?php


namespace App\Http\Controllers;


use App\Http\Requests\Invoice\CreateInvoiceRequest;
use App\Http\Resources\Invoice\CreateInvoiceResource;
use App\Http\Service\InvoiceService;
use Illuminate\Http\Response;


class InvoiceController extends BaseController
{
    private $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function create(CreateInvoiceRequest $createInvoiceRequest)
    {
        $newInvoice = $this->invoiceService->create($createInvoiceRequest->all());
        $newProductsResource = new CreateInvoiceResource($newInvoice);
        return $this->response(
            $newProductsResource->toArray($newInvoice),
            Response::HTTP_CREATED,
            trans('response.invoice.create_successfully_group')
        );

    }

}