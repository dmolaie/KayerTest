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
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AttachmentDTO
     */
    public function setType(string $type): AttachmentDTO
    {
        $this->type = $type;
        return $this;
    }

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