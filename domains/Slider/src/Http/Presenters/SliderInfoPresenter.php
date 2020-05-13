<?php


namespace Domains\Slider\Http\Presenters;


use Carbon\Carbon;
use Domains\Slider\Services\Contracts\DTOs\SliderInfoDTO;

class SliderInfoPresenter
{
    public function transformMany(array $sliderInfoDTOs): array
    {
        return array_map(function ($sliderInfoDTO) {
            return $this->transform($sliderInfoDTO);
        }, $sliderInfoDTOs);
    }

    public function transform(SliderInfoDTO $sliderInfoDTO)
    {
        return [
            'id'                 => $sliderInfoDTO->getId(),
            'first_title'        => $sliderInfoDTO->getFirstTitle(),
            'publish_date'       => strtotime($sliderInfoDTO->getPublishDate()),
            'status'             => $this->getStatus($sliderInfoDTO),
            'is_created_by_user' => $this->isCreatedByUser($sliderInfoDTO),
            'province'           => [
                'id'   => $sliderInfoDTO->getProvince()->id,
                'name' => $sliderInfoDTO->getProvince()->name,
            ],
            'publisher'          => [
                'id'        => $sliderInfoDTO->getPublisher()->id,
                'name'      => $sliderInfoDTO->getPublisher()->name,
                'last_name' => $sliderInfoDTO->getPublisher()->last_name
            ],
            'editor'             => $sliderInfoDTO->getEditor() ? [
                'id'        => $sliderInfoDTO->getEditor()->id,
                'name'      => $sliderInfoDTO->getEditor()->name,
                'last_name' => $sliderInfoDTO->getEditor()->last_name
            ] : null,
            'language'           => $sliderInfoDTO->getLanguage(),
            'relation_id'        => $sliderInfoDTO->getRelationSliderId(),
            'image_paths'        => $sliderInfoDTO->getAttachmentFiles() ?? []
        ];
    }

    private function getStatus(SliderInfoDTO $sliderInfoDTO)
    {
        if ($sliderInfoDTO->getStatus() != 'accept') {
            return [
                'fa' => trans('slider::slider.slider_statuses.' . $sliderInfoDTO->getStatus()),
                'en' => $sliderInfoDTO->getStatus()
            ];
        }
        if (
        Carbon::parse($sliderInfoDTO->getPublishDate())->lessThanOrEqualTo(Carbon::now())) {
            return [
                'fa' => trans('slider::slider.slider_statuses.published'),
                'en' => 'published'
            ];

        }
        return [
            'fa' => trans('slider::slider.slider_statuses.ready_to_publish'),
            'en' => 'ready_to_publish'
        ];


    }

    private function isCreatedByUser(SliderInfoDTO $sliderInfoDTO)
    {
        if (!\Auth::user()) {
            return false;
        }
        if ($sliderInfoDTO->getPublisher()->id == \Auth::user()->id) {
            return true;
        }
        return false;
    }
}