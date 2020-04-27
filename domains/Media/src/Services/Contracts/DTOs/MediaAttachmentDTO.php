<?php


namespace Domains\Media\Services\Contracts\DTOs;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;

/**
 * Class MediaAttachmentDTO
 */
class MediaAttachmentDTO
{
    /**
     * @var AttachmentInfoDTO|null
     */
    protected $attachmentDTO;
    /**
     * @var AttachmentInfoDTO|null
     */
    protected $contentDTO;

    /**
     * @return AttachmentInfoDTO|null
     */
    public function getAttachmentDTO(): ?AttachmentInfoDTO
    {
        return $this->attachmentDTO;
    }

    /**
     * @param AttachmentInfoDTO|null $attachmentDTO
     * @return MediaAttachmentDTO
     */
    public function setAttachmentDTO(?AttachmentInfoDTO $attachmentDTO): MediaAttachmentDTO
    {
        $this->attachmentDTO = $attachmentDTO;
        return $this;
    }

    /**
     * @return AttachmentInfoDTO|null
     */
    public function getContentDTO(): ?AttachmentInfoDTO
    {
        return $this->contentDTO;
    }

    /**
     * @param AttachmentInfoDTO|null $contentDTO
     * @return MediaAttachmentDTO
     */
    public function setContentDTO(?AttachmentInfoDTO $contentDTO): MediaAttachmentDTO
    {
        $this->contentDTO = $contentDTO;
        return $this;
    }
}