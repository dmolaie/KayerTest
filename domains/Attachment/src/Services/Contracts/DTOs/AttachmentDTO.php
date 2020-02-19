<?php

namespace Domains\Attachment\Services\Contracts\DTOs;

/**
 * Class LoginAdminValueObject
 */
class AttachmentDTO extends AttachmentBaseDTO
{
    /**
     * @var array
     */
    protected $file;

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->file;
    }

    /**
     * @param array $file
     * @return AttachmentDTO
     */
    public function setFiles(array $file): AttachmentDTO
    {
        $this->file = $file;
        return $this;
    }

}