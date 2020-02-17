<?php


namespace Domains\News\src\Http\Presenters;


use Domains\News\src\Services\Contracts\DTOs\NewsInfoDTO;

class NewsInfoPresenter
{
    public function transformMany(array $newsInfoDTOs): array
    {
        return array_map(function ($newsInfoDTO) {
            return $this->transform($newsInfoDTO);
        }, $newsInfoDTOs);
    }

    public function transform(NewsInfoDTO $newsInfoDTO)
    {
        return [
            'first_title'  => $newsInfoDTO->getFirstTitle(),
            'second_title' => $newsInfoDTO->getSecondTitle(),
            'abstract'     => $newsInfoDTO->getAbstract(),
            'description'  => $newsInfoDTO->getDescription(),
            'category'     => $newsInfoDTO->getCategory() ?
                [
                    'name' => $newsInfoDTO->getCategory()->name_en,
                    'id'   => $newsInfoDTO->getCategory()->id
                ] : null,
            'publish_date' => strtotime($newsInfoDTO->getPublishDate()),
            'source_link'  => $newsInfoDTO->getSourceLink(),
            'status'       => [
                'fa' => trans('news::news.news_statue.' . $newsInfoDTO->getStatus()),
                'en' => $newsInfoDTO->getStatus()
            ],
            'province'     => [
                'id'   => $newsInfoDTO->getProvince()->id,
                'name' => $newsInfoDTO->getProvince()->name,
            ],
            'publisher'    => [
                'name'      => $newsInfoDTO->getPublisher()->name,
                'last_name' => $newsInfoDTO->getPublisher()->last_name
            ],
            'editor'       => $newsInfoDTO->getEditor() ? [
                'name'      => $newsInfoDTO->getEditor()->name,
                'last_name' => $newsInfoDTO->getEditor()->last_name
            ] : null,
            'language'     => $newsInfoDTO->getLanguage(),
            'relation_id'  => $newsInfoDTO->getRelationNewsId(),
            'image_path'   => $newsInfoDTO->getAttachmentFiles()
        ];
    }
}