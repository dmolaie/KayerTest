<?php

namespace Domains\Slider\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Illuminate\Validation\Rule;

class ChangeSliderStatusRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slider_id'   => 'required|integer|exists:sliders,id',
            'status'     => [
                'required',
                'string',
                Rule::in([
                    config('slider.slider_accept_status'),
                    config('slider.slider_reject_status'),
                    config('slider.slider_cancel_status'),
                    config('slider.slider_pending_status'),
                    config('slider.slider_recycle_status'),
                ]),
            ],
        ];
    }

    public function messages()
    {
        return trans('slider::validation');
    }

    public function attributes()
    {
        return trans('slider::validation.attributes');
    }

}
