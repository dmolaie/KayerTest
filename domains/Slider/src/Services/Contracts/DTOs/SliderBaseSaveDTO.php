<?php


namespace Domains\Slider\Services\Contracts\DTOs;


class SliderBaseSaveDTO
{
    /**
     * @var
     */
    protected $firstTitle;

    /**
     * @var  string
     */
    protected $publishDate;

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