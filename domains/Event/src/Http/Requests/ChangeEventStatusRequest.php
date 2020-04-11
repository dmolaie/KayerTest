<?php

namespace Domains\Event\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Illuminate\Validation\Rule;

class ChangeEventStatusRequest extends EhdaBaseRequest
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
            'status' => [
                'required',
                'string',
                Rule::in([
                    config('event.event_accept_status'),
                    config('event.event_reject_status'),
                    config('event.event_cancel_status'),
                    config('event.event_pending_status'),
                    config('event.event_recycle_status'),
                ]),
            ],
        ];
    }

    public function messages()
    {
        return trans('event::validation');
    }

    public function attributes()
    {
        return trans('event::validation.attributes');
    }
}
