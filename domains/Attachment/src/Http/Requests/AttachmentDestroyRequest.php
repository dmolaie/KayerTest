<?php

namespace Domains\Attachment\Http\Requests;

use App\Http\Request\EhdaBaseRequest;

class AttachmentDestroyRequest extends EhdaBaseRequest
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
            'image_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return trans('attachment::validation');
    }


    public function attributes()
    {
        return trans('attachment::validation.attributes');
    }

}
