<?php


namespace Domains\Contact\Http\Presenters;


use Domains\Contact\Services\Contracts\DTOs\ContactDetailDTO;

class ContactDetailPresenter
{
    public function transformMany(array $contactDTOs): array
    {
        return array_map(function ($contract) {
            return $this->transform($contract);
        }, $contactDTOs);
    }

    public function transform(ContactDetailDTO $contactDTO)
    {
        return [
            'id'         => $contactDTO->getId(),
            'full_name'  => $contactDTO->getFullName(),
            'title'      => $contactDTO->getTitle(),
            'email'      => $contactDTO->getEmail(),
            'mobile'     => $contactDTO->getMobile(),
            'content'    => $contactDTO->getContent(),
            'created_at' => strtotime($contactDTO->getCreatedAt()),
            'type'       => trans('contact::baseLang.contactType.' . $contactDTO->getType()),

        ];

    }

}