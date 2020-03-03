<?php


namespace Domains\Event\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Event\Exceptions\EventNotFoundErrorException;
use Domains\Event\Http\Presenters\EventInfoPresenter;
use Domains\Event\Http\Presenters\EventPaginateInfoPresenter;
use Domains\Event\Http\Requests\CreateEventRequest;
use Domains\Event\Http\Requests\DestroyEventRequest;
use Domains\Event\Http\Requests\EditEventRequest;
use Domains\Event\Http\Requests\EventListForAdminRequest;
use Domains\Event\Services\EventService;
use Illuminate\Http\Response;

class EventController extends EhdaBaseController
{
    /**
     * @var EventService
     */
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function createEvent(CreateEventRequest $request, EventInfoPresenter $eventInfoPresenter)
    {
        $eventCreateDTO = $request->createEventCreateDTO();
        $eventInfoDTO = $this->eventService->createEvent($eventCreateDTO);
        return $this->response(
            $eventInfoPresenter->transform($eventInfoDTO),
            Response::HTTP_CREATED,
            trans('event::response.create_successful')
        );
    }

    public function editEvent(EditEventRequest $request, EventInfoPresenter $eventInfoPresenter)
    {
        $eventEditDTO = $request->createEventEditDTO();
        $eventInfoDTO = $this->eventService->editEvent($eventEditDTO);
        return $this->response(
            $eventInfoPresenter->transform($eventInfoDTO),
            Response::HTTP_OK,
            trans('event::response.edit_successful')
        );

    }

    public function getListForAdmin(EventListForAdminRequest $request, EventPaginateInfoPresenter $eventPaginateInfoPresenter)
    {
        $eventPaginateInfoDTO = $this->eventService->filterEvent($request->createEventFilterDTO());
        return $this->response(
            $eventPaginateInfoPresenter->transform($eventPaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function destroyEvent(DestroyEventRequest $request)
    {
        try {
            $this->eventService->destroyEvent($request->event_id);
            return $this->response([], Response::HTTP_OK, trans('event::response.success_delete_event'));
        } catch (EventNotFoundErrorException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }
}