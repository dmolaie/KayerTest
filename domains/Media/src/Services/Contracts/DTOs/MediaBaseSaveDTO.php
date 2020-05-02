<?php


namespace Domains\Media\Services\Contracts\DTOs;


class MediaBaseSaveDTO
{
    /**
     * @var
     */
    protected $firstTitle;

    /**
     * @var string
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $abstract;
    /**
     * @var string|null
     */
    protected $description;
    /**
     * @var null|array
     */
    protected $categories;

    /**
     * @var null|int
     */
    protected $categoryIsMain;

    /**
     * @var  string
     */
    protected $publishDate;

    /**
     * @var null|string
     */
    protected $slug;

    /**
     * @var null|integer
     */
    protected $provinceId;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var null|string
     */
    protected $status;

    /**
     * @var null|array
     */
    protected $attachmentFiles;

    /**
     * @var null|string
     */
    protected $uuid;

    /**
     * @var null|array
     */
    protected $contentFiles;
}

