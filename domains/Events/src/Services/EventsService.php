<?php


namespace Domains\Events\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Events\Entities\Events;
use Domains\Events\Repositories\EventsRepository;
use Domains\Events\Services\Contracts\DTOs\DTOMakers\EventsInfoDTOMaker;
use Domains\Events\Services\Contracts\DTOs\EventsBaseSaveDTO;
use Domains\Events\Services\Contracts\DTOs\EventsCreateDTO;
use Domains\Events\Services\Contracts\DTOs\EventsInfoDTO;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;

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
     * NewsService constructor.
     * @param EventsRepository $eventsRepository
     * @param RoleServices $roleServices
     * @param AttachmentServices $attachmentServices
     * @param EventsInfoDTOMaker $eventsInfoDTOMaker
     */
    public function __construct(EventsRepository $eventsRepository, RoleServices $roleServices, AttachmentServices $attachmentServices, EventsInfoDTOMaker $eventsInfoDTOMaker)
    {
        $this->eventsRepository = $eventsRepository;
        $this->roleServices = $roleServices;
        $this->eventsInfoDTOMaker = $eventsInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
    }

    /**
     * @param EventsCreateDTO $eventsCreateDTO
     * @return EventsInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
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
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getEventsStatus(User $publisher)
    {
        if ($this->roleServices->isAdminRole($publisher->role_id)) {
            return config('events.events_accept_status');
        }
        return config('events.events_pending_status');
    }

    /**
     * @param Events $events
     * @param EventsBaseSaveDTO $eventsBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
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
}