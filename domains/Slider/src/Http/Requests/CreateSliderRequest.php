<?php

namespace Domains\Slider\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Slider\Services\Contracts\DTOs\SliderCreateDTO;
use Illuminate\Validation\Rule;

class CreateSliderRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_title'      => 'required|string',
            'publish_date'     => 'required|numeric',
            'province_id'      => 'required|integer|exists:provinces,id',
            'parent_id'        => 'integer|exists:sliders,id|unique:slider',
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

    public function createSliderCreateDTO()
    {
        $sliderCreateDTO = new SliderCreateDTO();
        $sliderCreateDTO->setProvinceId($this['province_id'])
            ->setPublisher(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setParentId($this['parent_id'])
            ->setAttachmentFiles($this['images']);

        return $sliderCreateDTO;
    }
}
