<?php


namespace Domains\Event\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Event\Entities\Event;
use Domains\Event\Exceptions\EventNotFoundErrorException;
use Domains\Event\Repositories\EventRepository;
use Domains\Event\Services\Contracts\DTOs\DTOMakers\EventInfoDTOMaker;
use Domains\Event\Services\Contracts\DTOs\EventBaseSaveDTO;
use Domains\Event\Services\Contracts\DTOs\EventCreateDTO;
use Domains\Event\Services\Contracts\DTOs\EventEditDTO;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Domains\Event\Services\Contracts\DTOs\EventInfoDTO;
use Domains\News\Services\Contracts\DTOs\NewsInfoDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;
use Domains\User\Exceptions\AttachmentFileErrorException;
use Domains\User\Services\UserService;
use Illuminate\Config\Repository;

/**
 * Class EventService
 */
class EventService
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @var RoleServices
     */
    private $roleServices;

    /**
     * @var EventInfoDTOMaker
     */
    private $eventInfoDTOMaker;

    /**
     * @var AttachmentServices
     */
    private $attachmentServices;

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var UserService
     */
    private $paginationDTOMaker;


    /**
     * NewsService constructor.
     * @param EventRepository $eventRepository
     * @param RoleServices $roleServices
     * @param AttachmentServices $attachmentServices
     * @param EventInfoDTOMaker $eventInfoDTOMaker
     * @param UserService $userService
     * @param PaginationDTOMaker $paginationDTOMaker
     */
    public function __construct(
        EventRepository $eventRepository,
        RoleServices $roleServices,
        AttachmentServices $attachmentServices,
        EventInfoDTOMaker $eventInfoDTOMaker,
        UserService $userService,
        PaginationDTOMaker $paginationDTOMaker
    )
    {
        $this->eventRepository = $eventRepository;
        $this->roleServices = $roleServices;
        $this->eventInfoDTOMaker = $eventInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->userService = $userService;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
    }

    /**
     * @param EventCreateDTO $eventCreateDTO
     * @return EventInfoDTO
     * @throws AttachmentFileErrorException
     */
    public function createEvent(EventCreateDTO $eventCreateDTO)
    {
        $eventCreateDTO->setStatus(
            $this->getEventStatus($eventCreateDTO->getPublisher())
        );
        $event = $this->eventRepository->create($eventCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForEvent($event, $eventCreateDTO);
        return $this->eventInfoDTOMaker->convert($event, $attachmentInfoDto);
    }

    /**
     * @param User $publisher
     * @return Repository|mixed
     */
    private function getEventStatus(User $publisher)
    {
        if ($this->userService->isUserAdmin($publisher->id)) {
            return config('event.event_accept_status');
        }
        return config('event.event_pending_status');
    }

    /**
     * @param Event $event
     * @param EventBaseSaveDTO $eventBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws AttachmentFileErrorException
     */
    private function addAttachmentForEvent(Event $event, EventBaseSaveDTO $eventBaseSaveDTO): ?AttachmentInfoDTO
    {
        if (!$eventBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($event->id)
            ->setEntityName(class_basename(Event::class))
            ->setFiles($eventBaseSaveDTO->getAttachmentFiles());

        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    /**
     * @param EventEditDTO $eventEditDTO
     * @return EventEditDTO
     * @throws AttachmentFileErrorException
     */
    public function editEvent(EventEditDTO $eventEditDTO)
    {
        $eventEditDTO->setStatus(
            $this->getEventStatus($eventEditDTO->getEditor())
        );
        $event = $this->eventRepository->editEvent($eventEditDTO);
        $this->addAttachmentForEvent($event, $eventEditDTO);
        $attachmentInfoDto = $this->getAttachmentInfoEvent(class_basename(Event::class), [$event->id]);
        $images = $attachmentInfoDto->getImages()[$event->id];
        return $this->eventInfoDTOMaker->convert($event, $images);
    }

    /**
     * @param string $entityName
     * @param array $eventIds
     * @return AttachmentGetInfoDTO|null
     */
    private function getAttachmentInfoEvent(string $entityName, array $eventIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();

        if ($eventIds) {
            $attachmentGetInfoDTO->setEntityName($entityName)
                ->setEntityIds($eventIds);
            return $this->attachmentServices->getImagesByIds($attachmentGetInfoDTO);
        }
        return $attachmentGetInfoDTO;
    }

    /**
     * @param EventFilterDTO $eventFilterDTO
     * @return PaginationDTOMaker
     */
    public function filterEvent(EventFilterDTO $eventFilterDTO): PaginationDTOMaker
    {
        $events = $this->eventRepository->filter($eventFilterDTO);
        $eventIds = collect($events->items())->keyBy('id')->keys()->toArray();
        $attachmentInfoDto = $this->getAttachmentInfoEvent(class_basename(Event::class), $eventIds);
        return $this->paginationDTOMaker->perform(
            $events,
            EventInfoDTOMaker::class,
            $attachmentInfoDto
        );
    }

    /**
     * @param int $eventId
     * @return mixed
     * @throws EventNotFoundErrorException
     */
    public function destroyEvent(int $eventId)
    {
        $result = $this->eventRepository->destroyEvent($eventId);
        if (!$result) {
            throw new EventNotFoundErrorException(trans('event::response.event_not_found'));
        }
        return $result;
    }

}