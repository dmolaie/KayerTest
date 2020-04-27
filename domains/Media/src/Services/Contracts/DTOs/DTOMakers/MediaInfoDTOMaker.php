<?php


namespace Domains\Media\Services\Contracts\DTOs\DTOMakers;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Media\Entities\Media;
use Domains\Media\Services\Contracts\DTOs\MediaAttachmentDTO;
use Domains\Media\Services\Contracts\DTOs\MediaInfoDTO;
use Domains\Media\Services\Contracts\DTOs\MediaPaginationAttachmentDTO;

class MediaInfoDTOMaker
{
    public function convertMany($mediaCollection, ?MediaPaginationAttachmentDTO $attachments = null)
    {
        return $mediaCollection->map(function ($media) use ($attachments) {
            $mediaAttachment = new MediaAttachmentDTO();
            $mediaAttachment->setContentDTO($attachments->getContentDTOs()[$media->id])
                ->setAttachmentDTO($attachments->getAttachmentDTOs()[$media->id]);
            return $this->convert($media, $mediaAttachment);
        })->toArray();
    }

    public function convert(Media $media, ?MediaAttachmentDTO $attachment = null): MediaInfoDTO
    {

        $mediaInfoDTO = new MediaInfoDTO();
        $mediaInfoDTO->setFirstTitle($media->first_title)
            ->setStatus($media->status)
            ->setId($media->id)
            ->setAbstract($media->abstract)
            ->setDescription($media->description)
            ->setType($media->type)
            ->setCategories($this->categories($media->categories))
            ->setSlug($media->slug)
            ->setPublishDate($media->publish_date)
            ->setLanguage($media->language)
            ->setDescription($media->description)
            ->setPublisher($media->publisher)
            ->setEditor($media->editor)
            ->setRelationMediaId($this->getRelationMediaId($media))
            ->setAttachmentFiles($attachment->getAttachmentDTO() ? $attachment->getAttachmentDTO()->getPaths() : [])
            ->setContentFiles($attachment->getContentDTO() ? $attachment->getContentDTO()->getPaths() : [])
            ->setProvince($media->province)
            ->setUuid($media->uuid);

        return $mediaInfoDTO;
    }

    private function categories($categories)
    {
        return $categories->map(function ($category) {
            $data['name_en'] = $category->name_en;
            $data['name_fa'] = $category->name_fa;
            $data['id'] = $category->id;
            $data['is_main'] = $category->pivot->is_main ? true : false;
            return $data;
        })->toArray();
    }

    private function getRelationMediaId(Media $media)
    {
        $relationMedia = $media->parent ?? $media->child;
        return $relationMedia ? $relationMedia->id : null;
    }

}