<?php

namespace Domains\Attachment\Services\Contracts\DTOs;

/**
 * Class LoginAdminValueObject
 */
class AttachmentDTO
{
    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $entityId;

    /**
     * @return mixed
     */
    public function getEntityName() :string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     * @return AttachmentDTO
     */
    public function setEntityName(string $entityName)
    {
        $this->entityName = $entityName;
        return $this;
    }

    /**
     * @return array
     */
    public function getFileName(): array
    {
        return $this->fileName;
    }

    /**
     * @param array $fileName
     * @return AttachmentDTO
     */
    public function setFileName( array $fileName): AttachmentDTO
    {
        $this->fileName = $fileName;
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
    public function setFile(array $file): AttachmentDTO
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entityId;
    }

    /**
     * @param int $entityId
     * @return AttachmentDTO
     */
    public function setEntityId(int $entityId): AttachmentDTO
    {
        $this->entityId = $entityId;
        return $this;
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $national_code
     * @return AttachmentDTO
     */
    public function setPath(string $path): AttachmentDTO
    {
        $this->path = $path;
        return $this;
    }

}