<?php


namespace Domains\Menu\Services\Contracts\DTOs;


/**
 * Class MenuContentDTO
 */
class MenuContentDTO
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var
     */
    protected $contentObject;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MenuContentDTO
     */
    public function setType(string $type): MenuContentDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContentObject()
    {
        return $this->contentObject;
    }

    /**
     * @param mixed $contentObject
     * @return MenuContentDTO
     */
    public function setContentObject($contentObject)
    {
        $this->contentObject = $contentObject;
        return $this;
    }

}