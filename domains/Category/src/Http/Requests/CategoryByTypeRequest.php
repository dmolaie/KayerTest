<?php

namespace Domains\Category\Http\Requests;

use App\Http\Request\EhdaBaseRequest;

class CategoryByTypeRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_type' => 'required|string',
        ];
    }

    public function messages()
    {
        return trans('category::validation');
    }

    public function attributes()
    {
        return trans('category::validation.attributes');
    }

}
