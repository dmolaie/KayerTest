<?php

namespace Domains\Payment\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Payment\Services\Contracts\DTOs\DonationCreateDTO;
use Domains\User\Http\Requests\NationalCodeRequest;
use Illuminate\Validation\Rule;

class DonationRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'      => 'required|string',
            'phone'         => 'string',
            'national_code' => ['numeric', new NationalCodeRequest],
            'type'          => ['required',Rule::in(config('payment.type_help.keys'))],
            'amount'        => 'numeric|required',
        ];
    }

    public function messages()
    {
        return trans('payment::validation');
    }

    public function attributes()
    {
        return trans('payment::validation.attributes');
    }

    public function createDonation()
    {
        $donationCreateDTO = new DonationCreateDTO();
        $donationCreateDTO->setFullName($this['fullname'])
            ->setPhone($this['phone'])
            ->setNationalCode($this['national_code'])
            ->setAmount($this['amount'])
            ->setType($this['type']);

        return $donationCreateDTO;
    }
}
