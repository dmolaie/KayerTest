<?php


namespace Domains\Arvanvod\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Domains\Arvanvod\Services\ArvanvodService;
use Domains\Event\Http\Requests\CreateArvanvodRequest;

class ArvanvodController extends EhdaBaseController
{
    /**
     * @var EventService
     */
    private $eventService;

    public function __construct(ArvanvodService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function create(CreateArvanvodRequest $request)
    {
        $eventCreateDTO = $request->ArvanvodCreateDTO();
        $eventInfoDTO = $this->eventService->createEvent($eventCreateDTO);
  /*      return $this->response(
            $eventInfoPresenter->transform($eventInfoDTO),
            Response::HTTP_CREATED,
            trans('event::response.create_successful')
        );*/
    }

    public function edit(EditEventRequest $request, EventInfoPresenter $eventInfoPresenter)
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
        $userId = \Auth::id();
        $eventPaginateInfoDTO = $this->eventService->filterAdminEvents($request->createEventFilterDTO(),$userId);
        return $this->response(
            $eventPaginateInfoPresenter->transform($eventPaginateInfoDTO),
            Response::HTTP_OK
        );
    }

    public function delete(DestroyEventRequest $request)
    {

        try {
            $this->eventService->destroyEvent($request->event_id);
            return $this->response([], Response::HTTP_OK, trans('event::response.success_delete_event'));
        } catch (EventNotFoundErrorException $exception) {
            return $this->response([], $exception->getCode(), $exception->getMessage());
        } catch (ModelNotFoundException $exception) {
            return $this->response([], Response::HTTP_NOT_FOUND,
                trans('event::response.event_not_found'));
        }
    }

    public function changeStatus(ChangeEventStatusRequest $request, EventInfoPresenter $eventInfoPresenter)
    {
        try {
            $eventInfoDTO = $this->eventService->changeStatus(
                $request->event_id,
                $request->status
            );
            return $this->response(
                $eventInfoPresenter->transform($eventInfoDTO),
                Response::HTTP_OK,
                trans('event::response.edit_successful')
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('event::response.news_not_found')
            );
        }

    }

    public function getDetail(int $id, EventInfoPresenter $eventInfoPresenter)
    {
        try {
            $eventInfoDTO = $this->eventService->getEventDetail($id);

            return $this->response(
                $eventInfoPresenter->transform($eventInfoDTO),
                Response::HTTP_OK
            );
        } catch (ModelNotFoundException $exception) {
            return $this->response(
                [],
                Response::HTTP_NOT_FOUND,
                trans('event::response.event_not_found')
            );
        }
    }
}