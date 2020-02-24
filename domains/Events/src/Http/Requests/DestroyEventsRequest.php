<?php

namespace Domains\Events\Http\Requests;

use App\Http\Request\EhdaBaseRequest;

class DestroyEventsRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id' => 'required|integer|exists:events,id',
        ];
    }

    public function messages()
    {
        return trans('events::validation');
    }

    public function attributes()
    {
        return trans('events::validation.attributes');
    }
}
