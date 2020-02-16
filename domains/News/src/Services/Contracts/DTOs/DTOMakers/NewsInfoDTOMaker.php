<?php


namespace Domains\News\Services\Contracts\DTOs\DTOMakers;


use Domains\News\Entities\News;
use Domains\News\src\Services\Contracts\DTOs\NewsInfoDTO;

class NewsInfoDTOMaker
{
    public function convertMany($newsCollection)
    {
        return $newsCollection->map(function ($news) {
            return $this->convert($news);
        })->toArray();
    }

    public function convert(News $news): NewsInfoDTO
    {
        $newsInfoDTO = new NewsInfoDTO();
        $newsInfoDTO->setFirstTitle($news->first_title)
            ->setStatus($news->status)
            ->setSourceLink($news->source_link)
            ->setSecondTitle($news->seconde_title)
            ->setPublishDate($news->publish_date)
            ->setLanguage($news->language)
            ->setDescription($news->description)
            ->setAbstract($news->abstraction)
            ->setDescription($news->description)
            ->setEditor($news->editor)
            ->setRelationNewsId($this->getRelationNewsId($news))
            ->setProvince($news->province);

        return $newsInfoDTO;
    }

    private function getRelationNewsId(News $news)
    {
        $relationNews = $news->parent ?? $news->child;
        return $relationNews ? $relationNews->id : null;
    }

}