<?php


namespace Domains\News\Repositories;

use Domains\News\Entities\News;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;

class NewsRepository
{
    protected $entityName = News::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function create(NewsCreateDTO $newsCreateDTO): News
    {
        $news = new  $this->entityName;
        $news->first_title = $newsCreateDTO->getFirstTitle();
        $news->second_title = $newsCreateDTO->getSecondTitle();
        $news->abstract = $newsCreateDTO->getAbstract();
        $news->description = $newsCreateDTO->getDescription();
        $news->category_id = $newsCreateDTO->getCategoryId();
        $news->publish_date = $newsCreateDTO->getPublishDate();
        $news->source_link = $newsCreateDTO->getSourceLink();
        $news->status = $newsCreateDTO->getStatus();
        $news->province_id = $newsCreateDTO->getProvinceId();
        $news->publisher_id = $newsCreateDTO->getPublisher()->id;
        $news->language = $newsCreateDTO->getLanguage();
        $news->parent_id = $newsCreateDTO->getParentId();
        $news->save();
        return $news;
    }

}