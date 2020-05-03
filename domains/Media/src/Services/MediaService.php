<?php


namespace Domains\Media\Services;

use Domains\Attachment\Services\AttachmentServices;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentGetInfoDTO;
use Domains\Media\Entities\Media;
use Domains\Media\Exceptions\MediaNotFoundException;
use Domains\Media\Repositories\MediaRepository;
use Domains\Media\Services\Contracts\DTOs\DTOMakers\MediaInfoDTOMaker;
use Domains\Media\Services\Contracts\DTOs\DTOMakers\MenuContentDTOMaker;
use Domains\Media\Services\Contracts\DTOs\DTOMakers\PaginationDTO;
use Domains\Media\Services\Contracts\DTOs\MediaAttachmentDTO;
use Domains\Media\Services\Contracts\DTOs\MediaBaseSaveDTO;
use Domains\Media\Services\Contracts\DTOs\MediaCreateDTO;
use Domains\Media\Services\Contracts\DTOs\MediaEditDTO;
use Domains\Media\Services\Contracts\DTOs\MediaFilterDTO;
use Domains\Media\Services\Contracts\DTOs\MediaInfoDTO;
use Domains\Media\Services\Contracts\DTOs\MediaPaginationAttachmentDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\User\Entities\User;
use Domains\User\Services\UserService;

/**
 * Class MediaService
 */
class MediaService
{
    /**
     * @var MediaRepository
     */
    private $mediaRepository;
    /**
     * @var MediaInfoDTOMaker
     */
    private $mediaInfoDTOMaker;
    /**
     * @var AttachmentServices
     */
    private $attachmentServices;
    /**
     * @var PaginationDTOMaker
     */
    private $paginationDTOMaker;
    /**
     * @var UserService
     */
    private $userService;


    /**
     * MediaService constructor.
     * @param MediaRepository $mediaRepository
     * @param MediaInfoDTOMaker $mediaInfoDTOMaker
     * @param AttachmentServices $attachmentServices
     * @param PaginationDTOMaker $paginationDTOMaker
     * @param UserService $userService
     */
    public function __construct(
        MediaRepository $mediaRepository,
        MediaInfoDTOMaker $mediaInfoDTOMaker,
        AttachmentServices $attachmentServices,
        PaginationDTOMaker $paginationDTOMaker,
        UserService $userService
    ) {

        $this->mediaRepository = $mediaRepository;
        $this->mediaInfoDTOMaker = $mediaInfoDTOMaker;
        $this->attachmentServices = $attachmentServices;
        $this->paginationDTOMaker = $paginationDTOMaker;
        $this->userService = $userService;
    }

    /**
     * @param MediaCreateDTO $mediaCreateDTO
     * @return \Domains\Media\Services\Contracts\DTOs\MediaInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function createMedia(MediaCreateDTO $mediaCreateDTO)
    {
        $mediaCreateDTO->setStatus(
            $this->getMediaStatus($mediaCreateDTO->getPublisher(), config('media.media_pending_status'))
        );
        $media = $this->mediaRepository->create($mediaCreateDTO);
        $mediaAttachment = new MediaAttachmentDTO();
        $mediaAttachment->setAttachmentDTO(
            $this->addAttachmentForMedia($media, $mediaCreateDTO))
            ->setContentDTO($this->addContentForMedia($media, $mediaCreateDTO));
        return $this->mediaInfoDTOMaker->convert($media, $mediaAttachment);

    }

    /**
     * @param User $publisher
     * @param string $status
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getMediaStatus(User $publisher, string $status)
    {
        if ($status == config('media.media_pending_status') && $this->userService->isUserAdmin($publisher->id)) {
            return config('media.media_accept_status');
        }
        return $status;
    }

    /**
     * @param Media $media
     * @param MediaBaseSaveDTO $mediaBaseSaveDTO
     * @return AttachmentInfoDTO|null
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    private function addAttachmentForMedia(
        Media $media,
        MediaBaseSaveDTO $mediaBaseSaveDTO
    ): ?AttachmentInfoDTO {
        if (!$mediaBaseSaveDTO->getAttachmentFiles()) {
            return null;
        }

        $attachmentDTO = new AttachmentDTO();
        $attachmentDTO->setEntityId($media->id)
            ->setEntityName(ucfirst($mediaBaseSaveDTO->getType()))
            ->setFiles($mediaBaseSaveDTO->getAttachmentFiles());
        return $this->attachmentServices->uploadImages($attachmentDTO);
    }

    private function addContentForMedia(
        Media $media,
        MediaBaseSaveDTO $mediaBaseSaveDTO
    ): ?ContentGetInfoDTO {
        if (!$mediaBaseSaveDTO->getContentFiles()) {
            return null;
        }
        $contentDTO = new ContentDTO();
        $contentDTO->setEntityId($media->id)
            ->setEntityName(ucfirst($mediaBaseSaveDTO->getType()))
            ->setContentFileDTOs($mediaBaseSaveDTO->getContentFiles())
            ->setPath(config('media.media_default_path'));

        return $this->attachmentServices->uploadFiles($contentDTO);
    }

    /**
     * @param MediaEditDTO $mediaEditDTO
     * @return \Domains\Media\Services\Contracts\DTOs\MediaInfoDTO
     * @throws \Domains\User\Exceptions\AttachmentFileErrorException
     */
    public function editMedia(MediaEditDTO $mediaEditDTO)
    {
        $mediaEditDTO->setStatus(
            $this->getMediaStatus($mediaEditDTO->getEditor(), config('media.media_pending_status'))
        );

        $media = $this->mediaRepository->editMedia($mediaEditDTO);
        $this->addAttachmentForMedia($media, $mediaEditDTO);
        $this->addContentForMedia($media, $mediaEditDTO);
        $attachmentInfoDto = $this->getAttachmentInfoMedia(ucfirst($mediaEditDTO->getType()), [$media->id]);
        $contentInfoDto = $this->getContentInfoMedia(ucfirst($mediaEditDTO->getType()), [$media->id]);

        $mediaAttachment = new MediaAttachmentDTO();
        $mediaAttachment->setAttachmentDTO(
            $attachmentInfoDto->getImages()[$media->id])
            ->setContentDTO($contentInfoDto[$media->id]);
        return $this->mediaInfoDTOMaker->convert($media, $mediaAttachment);
    }

    /**
     * @param string $entityName
     * @param array $mediaIds
     * @return AttachmentGetInfoDTO|null
     */
    private function getAttachmentInfoMedia(string $entityName, array $mediaIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();

        if ($mediaIds) {
            $attachmentGetInfoDTO->setEntityName($entityName)
                ->setEntityIds($mediaIds);
            return $this->attachmentServices->getImagesByIds($attachmentGetInfoDTO);
        }
        return $attachmentGetInfoDTO;
    }

    /**
     * @param string $entityName
     * @param array $mediaIds
     * @return array
     */
    private function getContentInfoMedia(string $entityName, array $mediaIds)
    {
        $attachmentGetInfoDTO = new AttachmentGetInfoDTO();
        $attachmentGetInfoDTO->setEntityName($entityName)
            ->setEntityIds($mediaIds);
        return $this->attachmentServices->getContentByIds($attachmentGetInfoDTO);
    }

    /**
     * @param MediaFilterDTO $mediaFilterDTO
     * @return PaginationDTOMaker
     */
    public function filterMedia(MediaFilterDTO $mediaFilterDTO): PaginationDTOMaker
    {
        $media = $this->mediaRepository->filter($mediaFilterDTO);
        $mediaIds = collect($media->items())->keyBy('id')->keys()->toArray();
        $attachmentInfoDto = $this->getAttachmentInfoMedia(ucfirst($mediaFilterDTO->getType()), $mediaIds);
        $contentInfoDto = $this->getContentInfoMedia(ucfirst($mediaFilterDTO->getType()), $mediaIds);

        $mediaAttachment = new MediaPaginationAttachmentDTO();
        $mediaAttachment->setAttachmentDTOs(
            $attachmentInfoDto->getImages())
            ->setContentDTOs($contentInfoDto);
        return $this->paginationDTOMaker->perform(
            $media,
            MediaInfoDTOMaker::class,
            $mediaAttachment
        );

    }

    public function destroyMedia($mediaId)
    {
        $this->changeStatus($mediaId, config('media.media_delete_status'));
        $result = $this->mediaRepository->destroyMedia($mediaId);
        if (!$result) {
            throw new MediaNotFoundException(trans('media::response.media_not_found'));
        }
        return $result;
    }

    public function changeStatus(int $mediaId, string $status)
    {
        $oldMedia = $this->mediaRepository->findOrFail($mediaId);
        $media = $this->mediaRepository->changeStatus($oldMedia, $status);
        $attachmentInfoDto = $this->getAttachmentInfoMedia(ucfirst($oldMedia->type), [$media->id]);
        $contentInfoDto = $this->getContentInfoMedia(ucfirst($oldMedia->type), [$media->id]);

        $mediaAttachment = new MediaAttachmentDTO();
        $mediaAttachment->setAttachmentDTO(
            $attachmentInfoDto->getImages()[$media->id])
            ->setContentDTO($contentInfoDto[$media->id]);
        return $this->mediaInfoDTOMaker->convert($media, $mediaAttachment);
    }

    public function findWithMenuId(int $menuId): MediaInfoDTO
    {
        $media = $this->mediaRepository->findByMenuId($menuId);
        $attachmentInfoDto = $this->getAttachmentInfoMedia(ucfirst($media->type), [$media->id]);
        $contentInfoDto = $this->getContentInfoMedia(ucfirst($media->type), [$media->id]);

        $mediaAttachment = new MediaAttachmentDTO();
        $mediaAttachment->setAttachmentDTO(
            $attachmentInfoDto->getImages()[$media->id])
            ->setContentDTO($contentInfoDto[$media->id]);

        return $this->mediaInfoDTOMaker->convert($media, $mediaAttachment);
    }

    public function getMediaDetail(int $id)
    {
        $media = $this->mediaRepository->findOrFail($id);
        $attachmentInfoDto = $this->getAttachmentInfoMedia(ucfirst($media->type), [$media->id]);
        $contentInfoDto = $this->getContentInfoMedia(ucfirst($media->type), [$media->id]);

        $mediaAttachment = new MediaAttachmentDTO();
        $mediaAttachment->setAttachmentDTO(
            $attachmentInfoDto->getImages()[$media->id])
            ->setContentDTO($contentInfoDto[$media->id]);
        return $this->mediaInfoDTOMaker->convert($media, $mediaAttachment);
    }

    public function getMediaDetailWithUuid($uuid)
    {
        $media = $this->mediaRepository->findOrFailUuid($uuid);
        $attachmentInfoDto = $this->getAttachmentInfoMedia(ucfirst($media->type), [$media->id]);
        $contentInfoDto = $this->getContentInfoMedia(ucfirst($media->type), [$media->id]);

        $mediaAttachment = new MediaAttachmentDTO();
        $mediaAttachment->setAttachmentDTO(
            $attachmentInfoDto->getImages()[$media->id])
            ->setContentDTO($contentInfoDto[$media->id]);
        return $this->mediaInfoDTOMaker->convert($media, $mediaAttachment);
    }
}