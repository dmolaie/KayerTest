<?php


namespace Domains\Media\Services\Contracts\DTOs;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\ContentGetInfoDTO;

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
     * @var ContentGetInfoDTO|null
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
     * @return ContentGetInfoDTO|null
     */
    public function getContentDTO(): ?ContentGetInfoDTO
    {
        return $this->contentDTO;
    }

    /**
     * @param ContentGetInfoDTO|null $contentDTO
     * @return MediaAttachmentDTO
     */
    public function setContentDTO(?ContentGetInfoDTO $contentDTO): MediaAttachmentDTO
    {
        $this->contentDTO = $contentDTO;
        return $this;
    }
}