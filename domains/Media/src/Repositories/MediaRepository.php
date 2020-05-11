<?php


namespace Domains\Media\Repositories;

use Domains\Media\Entities\Media;
use Domains\Media\Services\Contracts\DTOs\MediaCreateDTO;
use Domains\Media\Services\Contracts\DTOs\MediaEditDTO;
use Domains\Media\Services\Contracts\DTOs\MediaFilterDTO;

class MediaRepository
{
    protected $entityName = Media::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function create(MediaCreateDTO $mediaCreateDTO): Media
    {
        $media = new $this->entityName;
        $media->first_title = $mediaCreateDTO->getFirstTitle();
        $media->type = $mediaCreateDTO->getType();
        $media->description = $mediaCreateDTO->getDescription();
        $media->abstract = $mediaCreateDTO->getAbstract();
        $media->publish_date = $mediaCreateDTO->getPublishDate();
        $media->slug = $mediaCreateDTO->getSlug();
        $media->status = $mediaCreateDTO->getStatus();
        $media->province_id = $mediaCreateDTO->getProvinceId();
        $media->publisher_id = $mediaCreateDTO->getPublisher()->id;
        $media->language = $mediaCreateDTO->getLanguage();
        $media->parent_id = $mediaCreateDTO->getParentId();

        $media->save();
        if ($mediaCreateDTO->getCategories()) {
            $mainCategory = $mediaCreateDTO->getCategoryIsMain() ?? $mediaCreateDTO->getCategories()[0];
            $secondaryCategoryId = array_diff($mediaCreateDTO->getCategories(),
                [$mainCategory]);
            $media->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $media->categories()->attach([$mainCategory], ['is_main' => true]);
        }

        return $media;
    }

    public function editMedia(MediaEditDTO $mediaEditDTO): Media
    {
        $media = $this->findOrFail($mediaEditDTO->getMediaId());
        $media->first_title = $mediaEditDTO->getFirstTitle();
        $media->type = $mediaEditDTO->getType();
        $media->abstract = $mediaEditDTO->getAbstract();
        $media->description = $mediaEditDTO->getDescription();
        $media->publish_date = $mediaEditDTO->getPublishDate();
        $media->slug = $mediaEditDTO->getSlug() ?? $media->slug;
        $media->status = $mediaEditDTO->getStatus();
        $media->province_id = $mediaEditDTO->getProvinceId();
        $media->editor_id = $mediaEditDTO->getEditor()->id;
        $media->language = $mediaEditDTO->getLanguage();

        $getDirty = $media->getDirty();
        if (!empty($getDirty)) {
            $media->save();
        }
        $media->categories()->sync([]);
        if ($mediaEditDTO->getCategoryIsMain() || $mediaEditDTO->getCategories()) {
            $mainCategory = $mediaEditDTO->getCategoryIsMain() ?? $mediaEditDTO->getCategories()[0];
            $secondaryCategoryId = array_diff($mediaEditDTO->getCategories() ?? [], [$mainCategory]);
            $media->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $media->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $media;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function findOrFailUuid(string $uuid)
    {
        return $this->entityName::where('uuid', '=', $uuid)->firstOrFail();
    }

    function filter(MediaFilterDTO $mediaFilterDTO)
    {
        $baseQuery = $this->entityName::
        when($mediaFilterDTO->getMediaRealStatus(), function ($query) use ($mediaFilterDTO) {
            if ($mediaFilterDTO->getMediaRealStatus() == config('media.media_convert_to_real_status.delete')) {
                return $query->onlyTrashed();
            }
            return $query->where('status', $mediaFilterDTO->getMediaRealStatus());
        })
            ->when($mediaFilterDTO->getPublisherId(), function ($query) use ($mediaFilterDTO) {
                return $query->where('publisher_id', $mediaFilterDTO->getPublisherId());
            })
            ->when($mediaFilterDTO->getFirstTitle(), function ($query) use ($mediaFilterDTO) {
                return $query->where('first_title', 'like', '%' . $mediaFilterDTO->getFirstTitle() . '%');
            })
            ->when($mediaFilterDTO->getCreateDateEnd(), function ($query) use ($mediaFilterDTO) {
                return $query->where('created_at', '<=', $mediaFilterDTO->getCreateDateEnd());
            })
            ->when($mediaFilterDTO->getCreateDateStart(), function ($query) use ($mediaFilterDTO) {
                return $query->where('created_at', '>=', $mediaFilterDTO->getCreateDateStart());
            })
            ->when($mediaFilterDTO->getMaxPublishDate(), function ($query) use ($mediaFilterDTO) {
                return $query->where('publish_date', '<=', $mediaFilterDTO->getMaxPublishDate());
            })
            ->when($mediaFilterDTO->getMinPublishDate(), function ($query) use ($mediaFilterDTO) {
                return $query->where('publish_date', '>=', $mediaFilterDTO->getMinPublishDate());
            })
            ->when($mediaFilterDTO->getLanguage(), function ($query) use ($mediaFilterDTO) {
                return $query->where('language', $mediaFilterDTO->getLanguage());
            })
            ->when($mediaFilterDTO->getCategoryIds(), function ($query) use ($mediaFilterDTO) {
                return $query->whereHas('categories', function ($query) use ($mediaFilterDTO) {
                    $query->whereIn('categories.id', $mediaFilterDTO->getCategoryIds());
                });
            })
            ->when($mediaFilterDTO->getProvinceId(), function ($query) use ($mediaFilterDTO) {
                return $query->where(function ($query) use ($mediaFilterDTO) {
                    $query->where('province_id', $mediaFilterDTO->getProvinceId())
                        ->orWhereNull('province_id');
                });
            })
            ->when($mediaFilterDTO->getType(), function ($query) use ($mediaFilterDTO) {
                return $query->where('type', $mediaFilterDTO->getType());

            })
            ->orderBy('created_at', $mediaFilterDTO->getSort())
            ->paginate($mediaFilterDTO->getPaginationCount()??config('media.media_paginate_count'));
        return $baseQuery;
    }

    public function destroyMedia(int $mediaId)
    {
        return $this->entityName::where('id', $mediaId)->delete();
    }

    public function findByMenuId(int $menuId)
    {
        return $this->entityName::whereHas('menus',
            function ($q) use ($menuId) {
                $q->where('id', '=', $menuId);

            })->where('status', '=', config('media.media_accept_status'))->firstOrFail();
    }

    public function changeStatus(Media $media, string $status): Media
    {
        $media->status = $status;
        $getDirty = $media->getDirty();
        if (!empty($getDirty)) {
            $media->save();
        }
        return $media;
    }

    public function findOrFailSlug($slug)
    {
        return $this->entityName::where('slug', '=', $slug)->firstOrFail();

    }

}