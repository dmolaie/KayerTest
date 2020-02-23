<?php


namespace Domains\Events\Services\Contracts\DTOs;


class EventsBaseSaveDTO
{
    /**
     * @var null|string
     */
    protected $title;

    /**
     * @var null|string
     */
    protected $abstract;

    /**
     * @var null|string
     */
    protected $description;

    /**
     * @var null|string
     */
    protected $eventStartDate;

    /**
     * @var null|string
     */
    protected $eventEndDate;

    /**
     * @var null|string
     */
    protected $eventStartRegisterDate;

    /**
     * @var null|string
     */
    protected $eventEndRegisterDate;

    /**
     * @var null|string
     */
    protected $location;

    /**
     * @var null|integer
     */
    protected $categoryId;

    /**
     * @var  string
     */
    protected $publishDate;

    /**
     * @var null|string
     */
    protected $sourceLinkText;
    /**
     * @var null|string
     */
    protected $sourceLinkImage;

    /**
     * @var null|string
     */
    protected $sourceLinkVideo;

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

}