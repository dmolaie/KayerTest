<?php

namespace Domains\Media\Http\Requests\Voice;

use App\Http\Request\EhdaBaseRequest;
use Illuminate\Validation\Rule;

class ChangeVoiceStatusRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'status'   => [
                'required',
                'string',
                Rule::in([
                    config('media.media_accept_status'),
                    config('media.media_reject_status'),
                    config('media.media_cancel_status'),
                    config('media.media_pending_status'),
                    config('media.media_recycle_status'),
                ]),
            ],
        ];
    }

    public function messages()
    {
        return trans('media::validation');
    }

    public function attributes()
    {
        return trans('media::validation.attributes');
    }

}
