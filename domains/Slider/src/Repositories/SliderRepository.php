<?php


namespace Domains\Slider\Repositories;

use Domains\Slider\Entities\Slider;
use Domains\Slider\Services\Contracts\DTOs\SliderCreateDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderEditDTO;
use Domains\Slider\Services\Contracts\DTOs\SliderFilterDTO;

class SliderRepository
{
    protected $entityName = Slider::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function create(SliderCreateDTO $sliderCreateDTO): Slider
    {
        $slider = new  $this->entityName;
        $slider->first_title = $sliderCreateDTO->getFirstTitle();
        $slider->publish_date = $sliderCreateDTO->getPublishDate();
        $slider->status = $sliderCreateDTO->getStatus();
        $slider->province_id = $sliderCreateDTO->getProvinceId();
        $slider->publisher_id = $sliderCreateDTO->getPublisher()->id;
        $slider->language = $sliderCreateDTO->getLanguage();
        $slider->parent_id = $sliderCreateDTO->getParentId();
        $slider->save();

        return $slider;
    }

    public function editSlider(SliderEditDTO $sliderEditDTO): Slider
    {
        $slider = $this->findOrFail($sliderEditDTO->getSliderId());
        $slider->first_title = $sliderEditDTO->getFirstTitle();
        $slider->publish_date = $sliderEditDTO->getPublishDate();
        $slider->status = $sliderEditDTO->getStatus();
        $slider->province_id = $sliderEditDTO->getProvinceId();
        $slider->editor_id = $sliderEditDTO->getEditor()->id;
        $slider->language = $sliderEditDTO->getLanguage();
        if (!empty($slider->getDirty())) {
            $slider->save();
        }

        return $slider;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }


    public function findOrFailUuid(string $uuid)
    {
        return $this->entityName::where('uuid', '=', $uuid)->firstOrFail();
    }

    function filter(SliderFilterDTO $sliderFilterDTO)
    {
        $baseQuery = $this->entityName
            ::when($sliderFilterDTO->getSliderRealStatus(), function ($query) use ($sliderFilterDTO) {
                if ($sliderFilterDTO->getSliderRealStatus() == config('slider.slider_convert_to_real_status.delete')) {
                    return $query->onlyTrashed();
                }
                return $query->where('status', $sliderFilterDTO->getSliderRealStatus());
            })
            ->when($sliderFilterDTO->getPublisherId(), function ($query) use ($sliderFilterDTO) {
                return $query->where('publisher_id', $sliderFilterDTO->getPublisherId());
            })
            ->when($sliderFilterDTO->getFirstTitle(), function ($query) use ($sliderFilterDTO) {
                return $query->where('first_title', 'like', '%' . $sliderFilterDTO->getFirstTitle() . '%');
            })
            ->when($sliderFilterDTO->getCreateDateEnd(), function ($query) use ($sliderFilterDTO) {
                return $query->where('created_at', '<=', $sliderFilterDTO->getCreateDateEnd());
            })
            ->when($sliderFilterDTO->getCreateDateStart(), function ($query) use ($sliderFilterDTO) {
                return $query->where('created_at', '>=', $sliderFilterDTO->getCreateDateStart());
            })
            ->when($sliderFilterDTO->getMaxPublishDate(), function ($query) use ($sliderFilterDTO) {
                return $query->where('publish_date', '<=', $sliderFilterDTO->getMaxPublishDate());
            })
            ->when($sliderFilterDTO->getMinPublishDate(), function ($query) use ($sliderFilterDTO) {
                return $query->where('publish_date', '>=', $sliderFilterDTO->getMinPublishDate());
            })
            ->when($sliderFilterDTO->getLanguage(), function ($query) use ($sliderFilterDTO) {
                return $query->where('language', $sliderFilterDTO->getLanguage());
            })
            ->when($sliderFilterDTO->getProvinceIds(), function ($query) use ($sliderFilterDTO) {
                return $query->whereIn('province_id', $sliderFilterDTO->getProvinceIds());
            })
            ->orderBy('publish_date', $sliderFilterDTO->getSort())
            ->paginate($sliderFilterDTO->getPaginationCount());
        return $baseQuery;
    }

    public function destroySlider(int $sliderId)
    {
        return $this->entityName::where('id', $sliderId)->delete();
    }

    public function changeStatus(int $sliderId, string $status): Slider
    {
        $slider = $this->findOrFail($sliderId);
        $slider->status = $status;
        $getDirty = $slider->getDirty();
        if (!empty($getDirty)) {
            $slider->save();
        }
        return $slider;
    }

}