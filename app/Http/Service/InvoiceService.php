<?php


namespace App\Http\Service;


use App\Http\Repositories\InvoiceRepository;

class InvoiceService
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function create($data)
    {
        return $this->invoiceRepository->create($data);
    }

}