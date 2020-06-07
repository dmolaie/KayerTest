<?php


namespace Domains\Contact\Services;

use Domains\Contact\Repositories\ContactRepository;
use Domains\Contact\Services\Contracts\DTOs\ContactCreateDTO;
use Domains\Contact\Services\Contracts\DTOs\ContactDTO;
use Domains\Contact\Services\Contracts\DTOs\ContactFilterDTO;
use Domains\Contact\Services\Contracts\DTOs\DTOMakers\ContactDetailDTOMaker;
use Domains\Contact\Services\Contracts\DTOs\DTOMakers\ContactDTOMaker;

class ContactService
{
    /**
     * @var ContactRepository
     */
    private $contactRepository;
    /**
     * @var ContactDTOMaker
     */
    private $contactDTOMaker;
    /**
     * @var ContactDetailDTOMaker
     */
    private $contactDetailDTOMaker;

    public function __construct(
        ContactRepository $contactRepository,
        ContactDTOMaker $contactDTOMaker,
        ContactDetailDTOMaker $contactDetailDTOMaker
    ) {
        $this->contactRepository = $contactRepository;
        $this->contactDTOMaker = $contactDTOMaker;

        $this->contactDetailDTOMaker = $contactDetailDTOMaker;
    }


    public function createContact(ContactCreateDTO $createContactCreateDTO): ContactDTO
    {
        $contact = $this->contactRepository->createContact($createContactCreateDTO);
        return $this->contactDTOMaker->convert($contact);
    }

    public function getContactList(ContactFilterDTO $contactFilterDTO)
    {
        $contacts = $this->contactRepository->filterContactList($contactFilterDTO);
        return $this->contactDTOMaker->convertMany($contacts);

    }

    public function getDetail(string $id)
    {
        $contact = $this->contactRepository->findOrFail($id);
        return $this->contactDetailDTOMaker->convert($contact);
    }

}