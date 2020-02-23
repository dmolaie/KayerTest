<?php


namespace Domains\Events\Http\Controllers;

use App\Http\Controllers\EhdaBaseController;
use Auth;
use Domains\Events\Http\Presenters\EventsInfoPresenter;
use Domains\Events\Http\Requests\CreateEventsRequest;
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
}