<?php


namespace Domains\Location\Http\Requests;


use App\Http\Request\EhdaBaseRequest;

class CityWithProvinceIdRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return trans('location::validation');
    }


    public function attributes()
    {
        return trans('location::validation.attributes');
    }
}