<?php


namespace Domains\News\Services\Contracts\DTOs\DTOMakers;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\News\Entities\News;
use Domains\News\Services\Contracts\DTOs\NewsInfoDTO;

class NewsInfoDTOMaker
{
    public function convertMany($newsCollection, ?AttachmentGetInfoDTO $attachments = null)
    {
        return $newsCollection->map(function ($news) use ($attachments) {
            return $this->convert($news, $attachments->getImages()[$news->id] ?? null);
        })->toArray();
    }

    public function convert(News $news, ?AttachmentInfoDTO $attachment = null): NewsInfoDTO
    {
        $newsInfoDTO = new NewsInfoDTO();
        $newsInfoDTO->setFirstTitle($news->first_title)
            ->setStatus($news->deleted_at ?config('news.news_delete_status'):$news->status)
            ->setId($news->id)
            ->setCategory($this->categories($news->categories))
            ->setSourceLink($news->source_link)
            ->setSecondTitle($news->second_title)
            ->setPublishDate($news->publish_date)
            ->setLanguage($news->language)
            ->setDescription($news->description)
            ->setAbstract($news->abstract)
            ->setDescription($news->description)
            ->setPublisher($news->publisher)
            ->setEditor($news->editor)
            ->setRelationNewsId($this->getRelationNewsId($news))
            ->setAttachmentFiles($attachment ? $attachment->getPaths() : [])
            ->setProvince($news->province);

        return $newsInfoDTO;
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

    private function getRelationNewsId(News $news)
    {
        $relationNews = $news->parent ?? $news->child;
        return $relationNews ? $relationNews->id : null;
    }

}