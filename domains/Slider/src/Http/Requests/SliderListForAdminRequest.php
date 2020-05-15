<?php

namespace Domains\Slider\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Slider\Services\Contracts\DTOs\SliderFilterDTO;
use Illuminate\Validation\Rule;

class SliderListForAdminRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_title'       => 'string',
            'create_date_start' => 'numeric',
            'create_date_end'   => 'numeric',
            'publisher_id'      => 'integer',
            'status'            => [Rule::in(config('slider.slider_list_status'))],
            'sort'              => [Rule::in('DESC', 'ASC')]
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

    public function createSliderFilterDTO(): SliderFilterDTO
    {
        $sliderFilterDTO = new SliderFilterDTO();
        $sliderFilterDTO->setCreateDateEnd(
            $this['create_date_end'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_end'])->toDateTimeString() : null)
            ->setCreateDateStart($this['create_date_start'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_start'])->toDateTimeString() : null)
            ->setPublisherId($this['publisher_id'])
            ->setSliderInputStatus($this['status'])
            ->setSort($this['sort'] ?? 'DESC')
            ->setFirstTitle($this['first_title']);
        return $sliderFilterDTO;
    }
}
