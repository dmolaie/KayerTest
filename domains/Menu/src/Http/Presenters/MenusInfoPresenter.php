<?php


namespace Domains\Menu\Http\Presenters;


use Domains\Menu\Services\Contracts\DTOs\MenusInfoDTO;

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
            'id'       => $menusInfoDTO->getId(),
            'title'    => $menusInfoDTO->getTitle(),
            'name'     => $menusInfoDTO->getName(),
            'alias'    => $menusInfoDTO->getAlias(),
            'type'     => $menusInfoDTO->getType(),
            'link'     => $menusInfoDTO->getLink() ? $menusInfoDTO->getLink() : null,
            'parent'   => $menusInfoDTO->getParent() ? $this->getParent($menusInfoDTO->getParent()) : null,
            'children' => $this->transformMany($menusInfoDTO->getChild()),
            'publisher'     => [
                'id'        => $menusInfoDTO->getPublisher()->id,
                'name'      => $menusInfoDTO->getPublisher()->name,
                'last_name' => $menusInfoDTO->getPublisher()->last_name
            ],
            'editor'        => $menusInfoDTO->getEditor() ? [
                'id'        => $menusInfoDTO->getEditor()->id,
                'name'      => $menusInfoDTO->getEditor()->name,
                'last_name' => $menusInfoDTO->getEditor()->last_name
            ] : null,
            'language'      => $menusInfoDTO->getLanguage(),
            'publish_date'  => strtotime($menusInfoDTO->getPublishDate()),
            'status'        => $menusInfoDTO->isActive(),
            'priority'      => $menusInfoDTO->getPriority(),

        ];
    }

    private function getParent($parent)
    {
        return [
            'id'   => $parent->id,
            'name' => $parent->name
        ];
    }

    private function getArticle($article)
    {
        return [
            'id' => $article->id,
            'name' => $article->name
        ];
    }
}