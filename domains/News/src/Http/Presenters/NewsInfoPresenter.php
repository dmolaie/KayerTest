<?php


namespace Domains\News\Http\Presenters;


use Domains\News\Services\Contracts\DTOs\NewsInfoDTO;

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
            'id' => $newsInfoDTO->getId(),
            'first_title' => $newsInfoDTO->getFirstTitle(),
            'second_title' => $newsInfoDTO->getSecondTitle(),
            'abstract' => $newsInfoDTO->getAbstract(),
            'description' => $newsInfoDTO->getDescription(),
            'category' => $newsInfoDTO->getCategory() ? $newsInfoDTO->getCategory() : null,
            'publish_date' => strtotime($newsInfoDTO->getPublishDate()),
            'source_link' => $newsInfoDTO->getSourceLink(),
            'status' => [
                'fa' => $this->getNewsStatus($newsInfoDTO),
                'en' => $newsInfoDTO->getStatus()
            ],
            'province' => [
                'id' => $newsInfoDTO->getProvince()->id,
                'name' => $newsInfoDTO->getProvince()->name,
            ],
            'publisher' => [
                'id' => $newsInfoDTO->getPublisher()->id,
                'name' => $newsInfoDTO->getPublisher()->name,
                'last_name' => $newsInfoDTO->getPublisher()->last_name
            ],
            'editor' => $newsInfoDTO->getEditor() ? [
                'id' => $newsInfoDTO->getEditor()->id,
                'name' => $newsInfoDTO->getEditor()->name,
                'last_name' => $newsInfoDTO->getEditor()->last_name
            ] : null,
            'language' => $newsInfoDTO->getLanguage(),
            'relation_id' => $newsInfoDTO->getRelationNewsId(),
            'image_paths' => $newsInfoDTO->getAttachmentFiles() ?? []
        ];
    }

    private function getNewsStatus(NewsInfoDTO $newsInfoDTO)
    {
        dd($newsInfoDTO->getStatus()== );
//        if(trans('news::news.news_statue.' . $newsInfoDTO->getStatus()))
    }
}