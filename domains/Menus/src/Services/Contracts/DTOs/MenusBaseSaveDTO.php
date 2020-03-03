<?php


namespace Domains\Menus\Services\Contracts\DTOs;


class MenusBaseSaveDTO
{
    /**
     * @var null|string
     */
    protected $title;

    /**
     * @var null|string
     */
    protected $name;

    /**
     * @var null|string
     */
    protected $alias;

    /**
     * @var null|string
     */
    protected $type;

    /**
     * @var null|string
     */
    protected $language;

    /**
     * @var null|string
     */
    protected $publishDate;

    /**
     * @var null|integer
     */
    protected $editorId;

    /**
     * @var null|integer
     */
    protected $publisherId;

    /**
     * @var null|integer
     */
    protected $parentid;

    /**
     * @var null|string
     */
    protected $link;


}