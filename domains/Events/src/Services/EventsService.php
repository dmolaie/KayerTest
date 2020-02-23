<?php


namespace Domains\Events\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Events\Entities\Events;
use Domains\Events\Exceptions\EventNotFoundErrorException;
use Domains\Events\Repositories\EventsRepository;
use Domains\Events\Services\Contracts\DTOs\DTOMakers\EventsInfoDTOMaker;
use Domains\Events\Services\Contracts\DTOs\EventsBaseSaveDTO;
use Domains\Events\Services\Contracts\DTOs\EventsCreateDTO;
use Domains\Events\Services\Contracts\DTOs\EventsEditDTO;
use Domains\Events\Services\Contracts\DTOs\EventsFilterDTO;
use Domains\Events\Services\Contracts\DTOs\EventsInfoDTO;
use Domains\News\Services\Contracts\DTOs\NewsInfoDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;
use Domains\User\Exceptions\AttachmentFileErrorException;
use Domains\User\Services\UserService;
use Illuminate\Config\Repository;

/**
 * Class EventsService
 */
class EventsService
{
    /**
     * @var EventsRepository
     */
    private $eventsRepository;

    /**
     * @var RoleServices
     */
    private $roleServices;

    /**
     * @var EventsInfoDTOMaker
     */
    private $eventsInfoDTOMaker;

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
     * @param EventsRepository $eventsRepository
     * @param RoleServices $roleServices
     * @param AttachmentServices $attachmentServices
     * @param EventsInfoDTOMaker $eventsInfoDTOMaker
     * @param UserService $userService
     * @param PaginationDTOMaker $paginationDTOMaker
     */
    public function __construct(
        EventsRepository $eventsRepository,
        RoleServices $roleServices,
        AttachmentServices $attachmentServices,
        EventsInfoDTOMaker $eventsInfoDTOMaker,
        UserService $userService,
        PaginationDTOMaker $paginationDTOMaker
    )
    {
        $this->eventsRepository = $eventsRepository;
        $this->roleServices = $roleServices;
        $this->eventsInfoDTOMaker = $eventsInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->userService = $userService;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
    }

    /**
     * @param EventsCreateDTO $eventsCreateDTO
     * @return EventsInfoDTO
     * @throws AttachmentFileErrorException
     */
    public function createEvents(EventsCreateDTO $eventsCreateDTO)
    {
        $eventsCreateDTO->setStatus(
            $this->getEventsStatus($eventsCreateDTO->getPublisher())
        );
        $events = $this->eventsRepository->create($eventsCreateDTO);
        $attachmentInfoDto = $this->addAttachmentForEvents($events, $eventsCreateDTO);
        return $this->eventsInfoDTOMaker->convert($events, $attachmentInfoDto);
    }

    /**
     * @param User $publisher
     * @return Repository|mixed
     */
    private function getEventsStatus(User $publisher)
    {
        if ($this->userService->isUserAdmin($publisher->id)) {
            return config('events.events_accept_status');
        }
        return config('events.events_pending_status');
    }

    /**
     * @param Events $events
     * @param EventsBaseSaveDTO $eventsBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws AttachmentFileErrorException
     */
    private function addAttachmentForEvents(Events $events, EventsBaseSaveDTO $eventsBaseSaveDTO): ?AttachmentInfoDTO
    {
        if (!$eventsBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }
        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($events->id)
            ->setEntityName(class_basename(Events::class))
            ->setFiles($eventsBaseSaveDTO->getAttachmentFiles());

        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    /**
     * @param EventsEditDTO $eventsEditDTO
     * @return NewsInfoDTO
     * @throws AttachmentFileErrorException
     */
    public function editEvents(EventsEditDTO $eventsEditDTO)
    {
        $eventsEditDTO->setStatus(
            $this->getEventsStatus($eventsEditDTO->getEditor())
        );
        $events = $this->eventsRepository->editEvents($eventsEditDTO);
        $this->addAttachmentForEvents($events, $eventsEditDTO);
        $attachmentInfoDto = $this->getAttachmentInfoEvents(class_basename(Events::class), [$events->id]);
        $images = $attachmentInfoDto->getImages()[$events->id];
        return $this->eventsInfoDTOMaker->convert($events, $images);
    }

    /**
     * @param string $entityName
     * @param array $eventsIds
     * @return AttachmentGetInfoDTO|null
     */
    private function getAttachmentInfoEvents(string $entityName, array $eventsIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();

        if ($eventsIds) {
            $attachmentGetInfoDTO->setEntityName($entityName)
                ->setEntityIds($eventsIds);
            return $this->attachmentServices->getImagesByIds($attachmentGetInfoDTO);
        }
        return $attachmentGetInfoDTO;
    }

    /**
     * @param EventsFilterDTO $eventsFilterDTO
     * @return PaginationDTOMaker
     */
    public function filterEvents(EventsFilterDTO $eventsFilterDTO): PaginationDTOMaker
    {
        $events = $this->eventsRepository->filter($eventsFilterDTO);
        $eventsIds = collect($events->items())->keyBy('id')->keys()->toArray();
        $attachmentInfoDto = $this->getAttachmentInfoEvents(class_basename(Events::class), $eventsIds);
        return $this->paginationDTOMaker->perform(
            $events,
            EventsInfoDTOMaker::class,
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
        $result = $this->eventsRepository->destroyEvent($eventId);
        if (!$result) {
            throw new EventNotFoundErrorException(trans('events::response.event_not_found'));
        }
        return $result;
    }

}