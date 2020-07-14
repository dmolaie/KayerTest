<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasOne;

class Invoice extends Model
{
    protected $table = "invoice";

    protected $fillable = [
        'invoice_number',
        'cart_id'
    ];

    /**
     * @return HasOne
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

}
