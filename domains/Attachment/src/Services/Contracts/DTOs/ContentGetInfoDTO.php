<?php


namespace Domains\Attachment\Services\Contracts\DTOs;


class ContentGetInfoDTO
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
     * @var array
     */
    protected $contentGetInfoFileDTOs=[];

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     * @return ContentGetInfoDTO
     */
    public function setEntityName(string $entityName): ContentGetInfoDTO
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
     * @return ContentGetInfoDTO
     */
    public function setEntityId(int $entityId): ContentGetInfoDTO
    {
        $this->entityId = $entityId;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getContentGetInfoFileDTOs(): ?array
    {
        return $this->contentGetInfoFileDTOs;
    }

    /**
     * @param array|null $contentGetInfoFileDTOs
     * @return ContentGetInfoDTO
     */
    public function setContentGetInfoFileDTOs(?array $contentGetInfoFileDTOs): ContentGetInfoDTO
    {
        $this->contentGetInfoFileDTOs = $contentGetInfoFileDTOs;
        return $this;
    }

    /**
     * @param $contentGetInfoFileDTO $contentGetInfoFileDTOs
     * @return ContentGetInfoDTO
     */
    public function addContentGetInfoFileDTOs(ContentGetInfoFileDTO $contentGetInfoFileDTO): ContentGetInfoDTO
    {
        $this->contentGetInfoFileDTOs[] = $contentGetInfoFileDTO;
        return $this;
    }


}