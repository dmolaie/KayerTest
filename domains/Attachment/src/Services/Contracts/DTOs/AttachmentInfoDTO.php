<?php

namespace Domains\Attachment\Services\Contracts\DTOs;

/**
 * Class AttachmentInfoDTO
 */
class AttachmentInfoDTO
{
    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var array
     */
    protected $paths;

    /**
     * @var string
     */
    protected $entityId;

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     * @return AttachmentInfoDTO
     */
    public function setEntityName(string $entityName): AttachmentInfoDTO
    {
        $this->entityName = $entityName;
        return $this;
    }

    /**
     * @return array
     */
    public function getPaths(): array
    {
        return $this->paths;
    }

    /**
     * @param array $paths
     * @return AttachmentInfoDTO
     */
    public function setPaths(array $paths): AttachmentInfoDTO
    {
        $this->paths = $paths;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }

    /**
     * @param string $entityId
     * @return AttachmentInfoDTO
     */
    public function setEntityId(string $entityId): AttachmentInfoDTO
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function addToPaths(int $id,string $path): AttachmentInfoDTO
    {
        $this->paths[$id] = $path;
        return $this;
    }

}