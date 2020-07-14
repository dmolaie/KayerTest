<?php

namespace App\Http\Repositories;

use App\Entities\Invoice;

class InvoiceRepository
{
    protected $entityName = Invoice::class;

    public function create($data)
    {
        $invoice = new $this->entityName;
        $invoice->cart_id = $data["cart_id"];
        $invoice->invoice_number = rand(1000, 1000000000) + rand(200, 88000);
        $invoice->save();
        return $invoice;
    }

}