<?php


namespace Domains\Menus\Http\Presenters;


use Carbon\Carbon;
use Domains\Events\Services\Contracts\DTOs\EventsInfoDTO;
use Domains\Menus\Services\Contracts\DTOs\MenusInfoDTO;

class MenusInfoPresenter
{
    public function transformMany(array $MenusInfoDTOs): array
    {
        return array_map(function ($MenusInfoDTO) {
            return $this->transform($MenusInfoDTO);
        }, $MenusInfoDTOs);
    }

    public function transform(MenusInfoDTO $menusInfoDTO)
    {
        return [
            'id' => $menusInfoDTO->getId(),
            'title' => $menusInfoDTO->getTitle(),
            'name' => $menusInfoDTO->getName(),
            'alias' => $menusInfoDTO->getAlias(),
            'type' => $menusInfoDTO->getType(),
            'link' => $menusInfoDTO->getLink() ? $menusInfoDTO->getLink() : null,
            'publisher' => [
                'id' => $menusInfoDTO->getPublisher()->id,
                'name' => $menusInfoDTO->getPublisher()->name,
                'last_name' => $menusInfoDTO->getPublisher()->last_name
            ],
            'editor' => $menusInfoDTO->getEditor() ? [
                'id' => $menusInfoDTO->getEditor()->id,
                'name' => $menusInfoDTO->getEditor()->name,
                'last_name' => $menusInfoDTO->getEditor()->last_name
            ] : null,
            'language' => $menusInfoDTO->getLanguage(),
            'publish_date' => strtotime($menusInfoDTO->getPublishDate()),

        ];
    }
}