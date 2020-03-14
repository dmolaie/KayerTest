<?php

namespace Domains\News\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Illuminate\Validation\Rule;

class ChangeNewsStatusRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_id'   => 'required|integer',
            'status'     => [
                'required',
                'string',
                Rule::in([
                    config('news.news_accept_status'),
                    config('news.news_reject_status'),
                    config('news.news_cancel_status'),
                    config('news.news_pending_status'),
                    config('news.news_recycle_status'),
                ]),
            ],
        ];
    }

    public function messages()
    {
        return trans('news::validation');
    }

    public function attributes()
    {
        return trans('news::validation.attributes');
    }

}
