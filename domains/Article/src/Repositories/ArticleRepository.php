<?php


namespace Domains\Article\Repositories;

use Domains\Article\Entities\Article;
use Domains\Article\Services\Contracts\DTOs\ArticleCreateDTO;
use Domains\Article\Services\Contracts\DTOs\ArticleEditDTO;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;

class ArticleRepository
{
    protected $entityName = Article::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function create(ArticleCreateDTO $articleCreateDTO): Article
    {
        $article = new  $this->entityName;
        $article->first_title = $articleCreateDTO->getFirstTitle();
        $article->second_title = $articleCreateDTO->getSecondTitle();
        $article->third_title = $articleCreateDTO->getThirdTitle();
        $article->abstract = $articleCreateDTO->getAbstract();
        $article->publish_date = $articleCreateDTO->getPublishDate();
        $article->slug = $articleCreateDTO->getSlug();
        $article->status = $articleCreateDTO->getStatus();
        $article->province_id = $articleCreateDTO->getProvinceId();
        $article->publisher_id = $articleCreateDTO->getPublisher()->id;
        $article->language = $articleCreateDTO->getLanguage();
        $article->parent_id = $articleCreateDTO->getParentId();

        $article->save();
        if ($articleCreateDTO->getCategories()) {
            $mainCategory = $articleCreateDTO->getCategoryIsMain() ?? $articleCreateDTO->getCategories()[0];
            $secondaryCategoryId = array_diff($articleCreateDTO->getCategories(),
                [$mainCategory]);
            $article->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $article->categories()->attach([$mainCategory], ['is_main' => true]);
        }

        return $article;
    }

    public function editArticle(ArticleEditDTO $articleEditDTO): Article
    {
        $article = $this->findOrFail($articleEditDTO->getArticleId());
        $article->first_title = $articleEditDTO->getFirstTitle();
        $article->second_title = $articleEditDTO->getSecondTitle();
        $article->third_title = $articleEditDTO->getThirdTitle();
        $article->abstract = $articleEditDTO->getAbstract();
        $article->description = $articleEditDTO->getDescription();
        $article->publish_date = $articleEditDTO->getPublishDate();
        $article->slug = $articleEditDTO->getSlug();
        $article->status = $articleEditDTO->getStatus();
        $article->province_id = $articleEditDTO->getProvinceId();
        $article->editor_id = $articleEditDTO->getEditor()->id;
        $article->language = $articleEditDTO->getLanguage();

        $getDirty = $article->getDirty();
        if (!empty($getDirty)) {
            $article->save();
        }
        $article->categories()->sync([]);
        if ($articleEditDTO->getCategoryIsMain() || $articleEditDTO->getCategories()) {
            $mainCategory = $articleEditDTO->getCategoryIsMain() ?? $articleEditDTO->getCategories()[0];
            $secondaryCategoryId = array_diff($articleEditDTO->getCategories() ?? [], [$mainCategory]);
            $article->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $article->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $article;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    function filter(ArticleFilterDTO $articleFilterDTO)
    {

        $baseQuery = $this->entityName::where('status', $articleFilterDTO->getArticleRealStatus())
            ->when($articleFilterDTO->getPublisherId(), function ($query) use ($articleFilterDTO) {
                return $query->where('publisher_id', $articleFilterDTO->getPublisherId());
            })
            ->when($articleFilterDTO->getFirstTitle(), function ($query) use ($articleFilterDTO) {
                return $query->where('first_title', 'like', '%' . $articleFilterDTO->getFirstTitle() . '%');
            })
            ->when($articleFilterDTO->getCreateDateEnd(), function ($query) use ($articleFilterDTO) {
                return $query->where('created_at', '<=', $articleFilterDTO->getCreateDateEnd());
            })
            ->when($articleFilterDTO->getCreateDateStart(), function ($query) use ($articleFilterDTO) {
                return $query->where('created_at', '>=', $articleFilterDTO->getCreateDateStart());
            })
            ->when($articleFilterDTO->getMaxPublishDate(), function ($query) use ($articleFilterDTO) {
                return $query->where('publish_date', '<=', $articleFilterDTO->getMaxPublishDate());
            })
            ->when($articleFilterDTO->getMinPublishDate(), function ($query) use ($articleFilterDTO) {
                return $query->where('publish_date', '>=', $articleFilterDTO->getMinPublishDate());
            })
            ->paginate(config('article.article_paginate_count'));

        return $baseQuery;
    }

}