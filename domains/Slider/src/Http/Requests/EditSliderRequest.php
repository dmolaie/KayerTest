<?php

namespace Domains\Slider\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Slider\Services\Contracts\DTOs\SliderEditDTO;
use Illuminate\Validation\Rule;

class EditSliderRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slider_id'          => 'required|integer|exists:sliders,id',
            'first_title'      => 'required|string',
            'publish_date'     => 'required|numeric',
            'province_id'      => 'required|integer|exists:provinces,id',
            'language'         => ['required', Rule::in(config('slider.slider_language'))],
            'images.*'         => 'image|max:500'
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

    public function createSliderEditDTO()
    {
        $sliderEditDTO = new SliderEditDTO();
        $sliderEditDTO->setSliderId($this['slider_id'])
            ->setProvinceId($this['province_id'])
            ->setEditor(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setAttachmentFiles($this['images']);

        return $sliderEditDTO;
    }
}
