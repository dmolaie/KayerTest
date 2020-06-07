<?php


namespace Domains\Contact\Http\Presenters;



use Domains\Contact\Services\Contracts\DTOs\ContactDTO;

class ContactInfoPresenter
{
    public function transformMany(array $contactDTOs): array
    {
        return array_map(function ($contract) {
            return $this->transform($contract);
        }, $contactDTOs);
    }

    public function transform(ContactDTO $contactDTO)
    {
        return [
            'id'         => $contactDTO->getId(),
            'full_name'  => $contactDTO->getFullName(),
            'title'      => $contactDTO->getTitle(),
            'email'      => $contactDTO->getEmail(),
            'mobile'     => $contactDTO->getMobile(),
            'created_at' => strtotime($contactDTO->getCreatedAt()),
            'type'       => trans('contact::baseLang.contactType.'. $contactDTO->getType()),

        ];

    }

}