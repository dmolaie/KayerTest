<?php

namespace Domains\Attachment\Services\Contracts\DTOs;

/**
 * Class AttachmentInfoDTO
 */
class AttachmentInfoDTO extends AttachmentBaseDTO
{
    /**
     * @var array
     */
    protected $paths;


    public function addToPaths(int $id,string $path): AttachmentInfoDTO
    {
        $this->paths[] = ['image_id' => $id, 'path' => $path];
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
     */
    public function setPaths(array $paths): void
    {
        $this->paths = $paths;
    }

}