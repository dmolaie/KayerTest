<?php


namespace Domains\Events\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Events\Exceptions\EventNotFoundErrorException;
use Domains\Events\Http\Presenters\EventsInfoPresenter;
use Domains\Events\Http\Presenters\EventsPaginateInfoPresenter;
use Domains\Events\Http\Requests\CreateEventsRequest;
use Domains\Events\Http\Requests\DestroyEventsRequest;
use Domains\Events\Http\Requests\EditEventsRequest;
use Domains\Events\Http\Requests\EventsListForAdminRequest;
use Domains\Events\Services\EventsService;
use Illuminate\Http\Response;

class EventsController extends EhdaBaseController
{
    /**
     * @var EventsService
     */
    private $eventsService;

    public function __construct(EventsService $eventsService)
    {
        $this->eventsService = $eventsService;
    }

    public function createEvents(CreateEventsRequest $request, EventsInfoPresenter $eventsInfoPresenter)
    {
        $eventsCreateDTO = $request->createEventsCreateDTO();
        $eventsInfoDTO = $this->eventsService->createEvents($eventsCreateDTO);
        return $this->response(
            $eventsInfoPresenter->transform($eventsInfoDTO),
            Response::HTTP_CREATED,
            trans('events::response.create_successful')
        );
    }

    public function editEvents(EditEventsRequest $request, EventsInfoPresenter $eventsInfoPresenter)
    {
        $eventsEditDTO = $request->createEventsEditDTO();
        $eventsInfoDTO = $this->eventsService->editEvents($eventsEditDTO);
        return $this->response(
            $eventsInfoPresenter->transform($eventsInfoDTO),
            Response::HTTP_OK,
            trans('events::response.edit_successful')
        );

    }

    public function getListForAdmin(EventsListForAdminRequest $request, EventsPaginateInfoPresenter $eventsPaginateInfoPresenter)
    {
        $eventsPaginateInfoDTO = $this->eventsService->filterEvents($request->createEventsFilterDTO());
        return $this->response(
            $eventsPaginateInfoPresenter->transform($eventsPaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function destroyEvent(DestroyEventsRequest $request)
    {
        try {
            $this->eventsService->destroyEvent($request->event_id);
            return $this->response([], Response::HTTP_OK, trans('events::response.success_delete_event'));
        } catch (EventNotFoundErrorException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        }
    }
}