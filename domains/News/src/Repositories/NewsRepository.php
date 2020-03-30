<?php


namespace Domains\News\Repositories;

use Domains\News\Entities\News;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Domains\News\Services\Contracts\DTOs\NewsEditDTO;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;

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

    public function create(NewsCreateDTO $newsCreateDTO): News
    {
        $news = new  $this->entityName;
        $news->first_title = $newsCreateDTO->getFirstTitle();
        $news->slug = $newsCreateDTO->getSlug();
        $news->second_title = $newsCreateDTO->getSecondTitle();
        $news->abstract = $newsCreateDTO->getAbstract();
        $news->description = $newsCreateDTO->getDescription();
        $news->publish_date = $newsCreateDTO->getPublishDate();
        $news->source_link = $newsCreateDTO->getSourceLink();
        $news->status = $newsCreateDTO->getStatus();
        $news->province_id = $newsCreateDTO->getProvinceId();
        $news->publisher_id = $newsCreateDTO->getPublisher()->id;
        $news->language = $newsCreateDTO->getLanguage();
        $news->parent_id = $newsCreateDTO->getParentId();
        $news->save();
        if ($newsCreateDTO->getCategoryIds() || $newsCreateDTO->getCategoryIsMain()) {
            $mainCategory = $newsCreateDTO->getCategoryIsMain() ?? $newsCreateDTO->getCategoryIds()[0];
            $secondaryCategoryId = array_diff($newsCreateDTO->getCategoryIds() ?? [],
                [$mainCategory]);
            $news->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $news->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $news;
    }

    public function editNews(NewsEditDTO $newsEditDTO): News
    {
        $news = $this->findOrFail($newsEditDTO->getNewsId());
        $news->first_title = $newsEditDTO->getFirstTitle();
        $news->second_title = $newsEditDTO->getSecondTitle();
        $news->abstract = $newsEditDTO->getAbstract();
        $news->slug = $newsEditDTO->getSlug() ?? $news->slug;
        $news->description = $newsEditDTO->getDescription();
        $news->publish_date = $newsEditDTO->getPublishDate();
        $news->source_link = $newsEditDTO->getSourceLink();
        $news->status = $newsEditDTO->getStatus();
        $news->province_id = $newsEditDTO->getProvinceId();
        $news->editor_id = $newsEditDTO->getEditor()->id;
        $news->language = $newsEditDTO->getLanguage();
        $getDirty = $news->getDirty();
        if (!empty($getDirty)) {
            $news->save();
        }
        $news->categories()->sync([]);
        if ($newsEditDTO->getCategoryIsMain() || $newsEditDTO->getCategoryIds()) {
            $mainCategory = $newsEditDTO->getCategoryIsMain() ?? $newsEditDTO->getCategoryIds()[0];
            $secondaryCategoryId = array_diff($newsEditDTO->getCategoryIds() ?? [], [$mainCategory]);
            $news->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $news->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $news;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function findOrFailSlug(string $slug)
    {
        return $this->entityName::where('slug', '=', $slug)->firstOrFail();
    }

    function filter(NewsFilterDTO $newsFilterDTO)
    {

        $baseQuery = $this->entityName
            ::when($newsFilterDTO->getNewsRealStatus(), function ($query) use ($newsFilterDTO) {
                if ($newsFilterDTO->getNewsRealStatus() == config('news.news_convert_to_real_status.delete')) {
                    return $query->onlyTrashed();
                }
                return $query->where('status', $newsFilterDTO->getNewsRealStatus());
            })
            ->when($newsFilterDTO->getPublisherId(), function ($query) use ($newsFilterDTO) {
                return $query->where('publisher_id', $newsFilterDTO->getPublisherId());
            })
            ->when($newsFilterDTO->getSlug(), function ($query) use ($newsFilterDTO) {
                return $query->where('slug', $newsFilterDTO->getSlug());
            })
            ->when($newsFilterDTO->getFirstTitle(), function ($query) use ($newsFilterDTO) {
                return $query->where('first_title', 'like', '%' . $newsFilterDTO->getFirstTitle() . '%');
            })
            ->when($newsFilterDTO->getCreateDateEnd(), function ($query) use ($newsFilterDTO) {
                return $query->where('created_at', '<=', $newsFilterDTO->getCreateDateEnd());
            })
            ->when($newsFilterDTO->getCreateDateStart(), function ($query) use ($newsFilterDTO) {
                return $query->where('created_at', '>=', $newsFilterDTO->getCreateDateStart());
            })
            ->when($newsFilterDTO->getMaxPublishDate(), function ($query) use ($newsFilterDTO) {
                return $query->where('publish_date', '<=', $newsFilterDTO->getMaxPublishDate());
            })
            ->when($newsFilterDTO->getMinPublishDate(), function ($query) use ($newsFilterDTO) {
                return $query->where('publish_date', '>=', $newsFilterDTO->getMinPublishDate());
            })
            ->when($newsFilterDTO->getLanguage(), function ($query) use ($newsFilterDTO) {
                return $query->where('language', $newsFilterDTO->getLanguage());
            })
            ->when($newsFilterDTO->getCategoryIds(), function ($query) use ($newsFilterDTO) {
                return $query->whereHas('categories', function ($query) use ($newsFilterDTO) {
                    $query->whereIn('categories.id', $newsFilterDTO->getCategoryIds());
                });
            })
            ->when($newsFilterDTO->getProvinceId(), function ($query) use ($newsFilterDTO) {
                return $query->where('province_id', $newsFilterDTO->getProvinceId());

            })
            ->orderBy('created_at', $newsFilterDTO->getSort())
            ->paginate($newsFilterDTO->getPaginationCount());
        return $baseQuery;
    }

    public function destroyNews(int $newsId)
    {
        return $this->entityName::where('id', $newsId)->delete();
    }

    public function changeStatus(int $newsId, string $status): News
    {
        $news = $this->findOrFail($newsId);
        $news->status = $status;
        $getDirty = $news->getDirty();
        if (!empty($getDirty)) {
            $news->save();
        }
        return $news;
    }

}