<?php


namespace Domains\Attachment\Services\Contracts\DTOs;


class ContentDTO
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
     * @var array|null
     */
    protected $contentFileDTOs;
    /**
     * @var string|null
     */
    protected $path;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return ContentDTO
     */
    public function setType(?string $type): ContentDTO
    {
        $this->type = $type;
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
     * @return ContentDTO
     */
    public function setEntityName(string $entityName): ContentDTO
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
     * @param int $entityId
     * @return ContentDTO
     */
    public function setEntityId(int $entityId): ContentDTO
    {
        $this->entityId = $entityId;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getContentFileDTOs(): ?array
    {
        return $this->contentFileDTOs;
    }

    /**
     * @param array|null $contentFileDTOs
     * @return ContentDTO
     */
    public function setContentFileDTOs(?array $contentFileDTOs): ContentDTO
    {
        $this->contentFileDTOs = $contentFileDTOs;
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
     * @return ContentDTO
     */
    public function setPath(?string $path): ContentDTO
    {
        $this->path = $path;
        return $this;
    }
}