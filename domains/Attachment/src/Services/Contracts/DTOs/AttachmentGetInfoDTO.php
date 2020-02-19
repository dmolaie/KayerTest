<?php


namespace Domains\Attachment\Services\Contracts\DTOs;


/**
 * Class AttachmentGetInfoDTO
 */
class AttachmentGetInfoDTO
{
    /**
     * @var array
     */
    protected $entityIds;
    /**
     * @var string
     */
    protected $entityName ;
    /**
     * @var array
     */
    protected $images = [];

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     * @return AttachmentGetInfoDTO
     */
    public function setImages(array $images): AttachmentGetInfoDTO
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return array
     */
    public function getEntityIds(): array
    {
        return $this->entityIds;
    }

    /**
     * @param array $entityIds
     * @return AttachmentGetInfoDTO
     */
    public function setEntityIds(array $entityIds): AttachmentGetInfoDTO
    {
        $this->entityIds = $entityIds;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     * @return AttachmentGetInfoDTO
     */
    public function setEntityName(string $entityName): AttachmentGetInfoDTO
    {
        $this->entityName = $entityName;
        return $this;
    }

    public function addImages(AttachmentInfoDTO $images,int $entityId)
    {
        $this->images[$entityId] = $images;
    }
}