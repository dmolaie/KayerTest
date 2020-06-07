<?php


namespace Domains\Contact\Repositories;

use Domains\Contact\Entities\Contact;
use Domains\Contact\Services\Contracts\DTOs\ContactCreateDTO;
use Domains\Contact\Services\Contracts\DTOs\ContactFilterDTO;

class ContactRepository
{
    protected $entityName = Contact::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(string $id)
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(string $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function createContact(ContactCreateDTO $createContactCreateDTO): Contact
    {
        $contact = new $this->entityName;

        $contact->full_name = $createContactCreateDTO->getFullName();
        $contact->email = $createContactCreateDTO->getEmail();
        $contact->type = $createContactCreateDTO->getType();
        $contact->mobile = $createContactCreateDTO->getMobile();
        $contact->title = $createContactCreateDTO->getTitle();
        $contact->content = $createContactCreateDTO->getContent();

        $contact->save();
        return $contact;
    }

    public function filterContactList(ContactFilterDTO $contactFilterDTO)
    {
        $baseQuery = $this->entityName
            ::when($contactFilterDTO->getType(), function ($query) use ($contactFilterDTO) {
                return $query->where('type', $contactFilterDTO->getType());
            })
            ->when($contactFilterDTO->getMobile(), function ($query) use ($contactFilterDTO) {
                return $query->where('mobile', $contactFilterDTO->getMobile());
            })
            ->when($contactFilterDTO->getTitle(), function ($query) use ($contactFilterDTO) {
                return $query->where('title', 'like', '%' . $contactFilterDTO->getTitle() . '%');
            })
            ->when($contactFilterDTO->getEmail(), function ($query) use ($contactFilterDTO) {
                return $query->where('email', 'like', '%' . $contactFilterDTO->getEmail() . '%');
            })
            ->when($contactFilterDTO->getFullName(), function ($query) use ($contactFilterDTO) {
                return $query->where('full_name', 'like', '%' . $contactFilterDTO->getFullName() . '%');
            })
            ->orderBy('created_at', $contactFilterDTO->getSort())
            ->paginate($contactFilterDTO->getPaginationCount());
        return $baseQuery;
    }
}