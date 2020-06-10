<?php


namespace Domains\Contact\Services\Contracts\DTOs\DTOMakers;


use Domains\Contact\Entities\Contact;
use Domains\Contact\Services\Contracts\DTOs\ContactDTO;

class ContactDTOMaker
{
    public function convertMany($categories)
    {
        return $categories->map(function ($contact) {
            return $this->convert($contact);
        })->toArray();
    }

    public function convert(Contact $contact)
    {
        $contactDTO = new ContactDTO();
        $contactDTO->setFullName($contact->full_name)
            ->setMobile($contact->mobile)
            ->setType($contact->type)
            ->setId($contact->id)
            ->setTitle($contact->title)
            ->setCreatedAt($contact->created_at)
            ->setEmail($contact->email);
        return $contactDTO;

    }
}