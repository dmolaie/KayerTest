<?php

namespace App\Http\Requests\Invoice;

use App\Http\Requests\KayerBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends KayerBaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cart_id' => 'required|integer|exists:cart,id',
        ];
    }
}
