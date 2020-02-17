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
    public function getFile(): array
    {
        return $this->file;
    }

    /**
     * @param array $file
     * @return AttachmentDTO
     */
    public function setFile(array $file): AttachmentDTO
    {
        $this->file = $file;
        return $this;
    }

}