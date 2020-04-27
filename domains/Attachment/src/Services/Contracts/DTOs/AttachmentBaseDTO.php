<?php

namespace Domains\Attachment\Services\Contracts\DTOs;

/**
 * Class AttachmentBaseDTO
 */
class AttachmentBaseDTO
{
    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var integer
     */
    protected $entityId;
    /**
     * @var string|null
     */
    protected $path;

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     * @return AttachmentBaseDTO
     */
    public function setEntityName(string $entityName)
    {
        $this->entityName = $entityName;
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
     * @param string $entityId
     * @return AttachmentBaseDTO
     */
    public function setEntityId(string $entityId)
    {
        $this->entityId = $entityId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     * @return AttachmentBaseDTO
     */
    public function setPath(?string $path)
    {
        $this->path = $path;
        return $this;
    }

}