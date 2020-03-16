<?php


namespace Domains\Article\Http\Presenters;


use Carbon\Carbon;
use Domains\Article\Services\Contracts\DTOs\ArticleInfoDTO;

class ArticleInfoPresenter
{
    public function transformMany(array $articleInfoDTOs): array
    {
        return array_map(function ($articleInfoDTO) {
            return $this->transform($articleInfoDTO);
        }, $articleInfoDTOs);
    }

    public function transform(ArticleInfoDTO $articleInfoDTO)
    {
        return [
            'id'           => $articleInfoDTO->getId(),
            'first_title'  => $articleInfoDTO->getFirstTitle(),
            'second_title' => $articleInfoDTO->getSecondTitle(),
            'third_title'  => $articleInfoDTO->getThirdTitle(),
            'abstract'     => $articleInfoDTO->getAbstract(),
            'description'  => $articleInfoDTO->getDescription(),
            'categories'   => $articleInfoDTO->getCategories(),
            'publish_date' => strtotime($articleInfoDTO->getPublishDate()),
            'slug'         => $articleInfoDTO->getSlug(),
            'status'       => $this->getStatus($articleInfoDTO),
            'province'     => $articleInfoDTO->getProvince()?[
                'id'   => $articleInfoDTO->getProvince()->id,
                'name' => $articleInfoDTO->getProvince()->name,
            ]:null,
            'publisher'    => [
                'id'        => $articleInfoDTO->getPublisher()->id,
                'name'      => $articleInfoDTO->getPublisher()->name,
                'last_name' => $articleInfoDTO->getPublisher()->last_name
            ],
            'editor'       => $articleInfoDTO->getEditor() ? [
                'id'        => $articleInfoDTO->getEditor()->id,
                'name'      => $articleInfoDTO->getEditor()->name,
                'last_name' => $articleInfoDTO->getEditor()->last_name
            ] : null,
            'language'     => $articleInfoDTO->getLanguage(),
            'relation_id'  => $articleInfoDTO->getRelationArticleId(),
            'image_paths'  => $articleInfoDTO->getAttachmentFiles() ?? []
        ];
    }

    private function getStatus(ArticleInfoDTO $articleInfoDTO)
    {
        if ($articleInfoDTO->getStatus() != 'accept') {
            return [
                'fa' => trans('article::article.article_statuses.' . $articleInfoDTO->getStatus()),
                'en' => $articleInfoDTO->getStatus()
            ];
        }

        if (
        Carbon::parse($articleInfoDTO->getPublishDate())->lessThanOrEqualTo(Carbon::now())) {
            return [
                'fa' => trans('article::article.article_statuses.published'),
                'en' => 'published'
            ];

        }
        return [
            'fa' => trans('article::article.article_statuses.ready_to_publish'),
            'en' => 'ready_to_publish'
        ];

    }
}