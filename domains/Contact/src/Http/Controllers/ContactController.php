<?php


namespace Domains\Contact\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Contact\Http\Presenters\ContactDetailPresenter;
use Domains\Contact\Http\Presenters\ContactInfoPresenter;
use Domains\Contact\Http\Presenters\ContactListPresenter;
use Domains\Contact\Http\Requests\ContactByTypeRequest;
use Domains\Contact\Http\Requests\CreateContactRequest;
use Domains\Contact\Services\ContactService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class ContactController extends EhdaBaseController
{
    /**
     * @var ContactService
     */
    private $contactService;

    public function __construct(ContactService $contactService)
    {

        $this->contactService = $contactService;
    }

    public function createContact(CreateContactRequest $request)
    {
        $this->contactService->createContact($request->createContactCreateDTO());
        return $this->response(
            [],
            Response::HTTP_CREATED,
            trans('contact::response.successful_create')
        );
    }

    public function contactListByType(
        ContactByTypeRequest $request,
        ContactInfoPresenter $contactInfoPresenter
    ) {
        $contactDTOs = $this->contactService->getContactList(
            $request->createContactFilterDTO()
        );
        return $this->response(
            $contactInfoPresenter->transformMany($contactDTOs),
            Response::HTTP_OK
        );
    }

    public function getDetail(string $id,
        ContactDetailPresenter $contactInfoPresenter)
    {
        try{
            $contactDTO = $this->contactService->getDetail($id);
            return $this->response(
                $contactInfoPresenter->transform($contactDTO),
                Response::HTTP_OK
            );
        }catch (ModelNotFoundException $exception){
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('contact::response.contact_not_found')
            );
        }


    }
}