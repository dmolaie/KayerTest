<?php


namespace Domains\Slider\Services\Contracts\DTOs\DTOMakers;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Slider\Entities\Slider;
use Domains\Slider\Services\Contracts\DTOs\SliderInfoDTO;

class SliderInfoDTOMaker
{
    public function convertMany($sliderCollection, ?AttachmentGetInfoDTO $attachments = null)
    {
        return $sliderCollection->map(function ($slider) use ($attachments) {
            return $this->convert($slider, $attachments->getImages()[$slider->id] ?? null);
        })->toArray();
    }

    public function convert(Slider $slider, ?AttachmentInfoDTO $attachment = null): SliderInfoDTO
    {
        $sliderInfoDTO = new SliderInfoDTO();
        $sliderInfoDTO->setFirstTitle($slider->first_title)
            ->setStatus($slider->deleted_at ? config('slider.slider_delete_status') : $slider->status)
            ->setId($slider->id)
            ->setPublishDate($slider->publish_date)
            ->setLanguage($slider->language)
            ->setPublisher($slider->publisher)
            ->setEditor($slider->editor)
            ->setRelationSliderId($this->getRelationSliderId($slider))
            ->setAttachmentFiles($attachment ? $attachment->getPaths() : [])
            ->setProvince($slider->province)
            ->setUuid($slider->uuid);

        return $sliderInfoDTO;
    }


    private function getRelationSliderId(Slider $slider)
    {
        $relationSlider = $slider->parent ?? $slider->child;
        return $relationSlider ? $relationSlider->id : null;
    }

}