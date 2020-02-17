<?php


namespace Domains\News\Services\Contracts\DTOs;


class NewsBaseSaveDTO
{
    protected $firstTitle;
    /**
     * @var null|string
     */
    protected $secondTitle;
    /**
     * @var null|string
     */
    protected $abstract;
    /**
     * @var null|string
     */
    protected $description;
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
    protected $sourceLink;
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