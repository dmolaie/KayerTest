<?php


namespace Domains\Media\Services\Contracts\DTOs;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;

/**
 * Class MediaPaginationAttachmentDTO
 */
class MediaPaginationAttachmentDTO
{
    /**
     * @var array|null
     */
    protected $attachmentDTO;
    /**
     * @var array|null
     */
    protected $contentDTO;

    /**
     * @return AttachmentInfoDTO|null
     */
    public function getAttachmentDTOs(): ?array
    {
        return $this->attachmentDTO;
    }

    /**
     * @param array|null $attachmentDTO
     * @return MediaPaginationAttachmentDTO
     */
    public function setAttachmentDTOs(?array $attachmentDTO): MediaPaginationAttachmentDTO
    {
        $this->attachmentDTO = $attachmentDTO;
        return $this;
    }

    /**
     * @return AttachmentInfoDTO|null
     */
    public function getContentDTOs(): ?array
    {
        return $this->contentDTO;
    }

    /**
     * @param array|null $contentDTO
     * @return MediaPaginationAttachmentDTO
     */
    public function setContentDTOs(?array $contentDTO): MediaPaginationAttachmentDTO
    {
        $this->contentDTO = $contentDTO;
        return $this;
    }
}