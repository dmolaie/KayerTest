<?php


namespace Domains\Attachment\Services\Contracts\DTOs;


/**
 * Class ContentFileDTO
 */
class ContentFileDTO
{
    /**
     * @var
     */
    protected $file;
    /**
     * @var string|null
     */
    protected $title;
    /**
     * @var string|null
     */
    protected $link;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return ContentFileDTO
     */
    public function setFile($file): ContentFileDTO
    {
        $this->file = $file;
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
     * @return ContentFileDTO
     */
    public function setTitle(?string $title): ContentFileDTO
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
     * @return ContentFileDTO
     */
    public function setLink(?string $link): ContentFileDTO
    {
        $this->link = $link;
        return $this;
    }
}