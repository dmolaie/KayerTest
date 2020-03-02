<?php


namespace Domains\Article\Services\Contracts\DTOs\DTOMakers;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Article\Entities\Article;
use Domains\Article\Services\Contracts\DTOs\ArticleInfoDTO;

class ArticleInfoDTOMaker
{
    public function convertMany($articleCollection, ?AttachmentGetInfoDTO $attachments = null)
    {
        return $articleCollection->map(function ($article) use ($attachments) {
            return $this->convert($article, $attachments->getImages()[$article->id] ?? null);
        })->toArray();
    }

    public function convert(Article $article, ?AttachmentInfoDTO $attachment = null): ArticleInfoDTO
    {

        $articleInfoDTO = new ArticleInfoDTO();
        $articleInfoDTO->setFirstTitle($article->first_title)
            ->setStatus($article->status)
            ->setId($article->id)
            ->setCategories($this->categories($article->categories))
            ->setSlug($article->slug)
            ->setSecondTitle($article->second_title)
            ->setThirdTitle($article->third_title)
            ->setPublishDate($article->publish_date)
            ->setLanguage($article->language)
            ->setDescription($article->description)
            ->setAbstract($article->abstract)
            ->setDescription($article->description)
            ->setPublisher($article->publisher)
            ->setEditor($article->editor)
            ->setRelationArticleId($this->getRelationArticleId($article))
            ->setAttachmentFiles($attachment ? $attachment->getPaths() : [])
            ->setProvince($article->province);

        return $articleInfoDTO;
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

    private function getRelationArticleId(Article $article)
    {
        $relationArticle = $article->parent ?? $article->child;
        return $relationArticle ? $relationArticle->id : null;
    }

}