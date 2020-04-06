<?php


namespace Domains\Article\Services\Contracts\DTOs;


class ArticleBaseSaveDTO
{
    /**
     * @var
     */
    protected $firstTitle;

    /**
     * @var null|string
     */
    protected $secondTitle;
    /**
     * @var null|string
     */
    protected $thirdTitle;

    /**
     * @var null|string
     */
    protected $abstract;

    /**
     * @var null|string
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
}