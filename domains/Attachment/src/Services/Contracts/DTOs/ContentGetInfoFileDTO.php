<?php


namespace Domains\Attachment\Services\Contracts\DTOs;


/**
 * Class ContentGetInfoFileDTO
 */
class ContentGetInfoFileDTO
{
    /**
     * @var string|null
     */
    protected $path;
    /**
     * @var string|null
     */
    protected $title;
    /**
     * @var string|null
     */
    protected $link;
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return ContentGetInfoFileDTO
     */
    public function setId(?string $id): ContentGetInfoFileDTO
    {
        $this->id = $id;
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
     * @return ContentGetInfoFileDTO
     */
    public function setPath(?string $path): ContentGetInfoFileDTO
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return ContentGetInfoFileDTO
     */
    public function setTitle(?string $title): ContentGetInfoFileDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return ContentGetInfoFileDTO
     */
    public function setLink(?string $link): ContentGetInfoFileDTO
    {
        $this->link = $link;
        return $this;
    }


}