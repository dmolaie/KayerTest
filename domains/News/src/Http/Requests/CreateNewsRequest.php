<?php

namespace Domains\News\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Illuminate\Validation\Rule;

class CreateNewsRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_title'      => 'required|string',
            'second_title'     => 'string',
            'abstract'         => 'string',
            'description'      => 'string',
            'slug'             => 'string|required|unique:news',
            'category_ids'     => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date'     => 'required|numeric',
            'source_link'      => 'url',
            'province_id'      => 'required|integer|exists:provinces,id',
            'parent_id'        => 'integer|exists:news,id|unique:news',
            'language'         => ['required', Rule::in(config('news.news_language'))],
            'images.*'         => 'image|max:500'
        ];
    }

    public function messages()
    {
        return trans('news::validation');
    }

    public function attributes()
    {
        return trans('news::validation.attributes');
    }

    public function createNewsCreateDTO()
    {
        $newsCreateDTO = new NewsCreateDTO();
        $newsCreateDTO->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategoryIds($this['category_ids'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setDescription($this['description'])
            ->setPublisher(\Auth::user())
            ->setLanguage($this['language'])
            ->setSlug($this['slug'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setSecondTitle($this['second_title'])
            ->setParentId($this['parent_id'])
            ->setAttachmentFiles($this['images'])
            ->setSourceLink($this['source_link']);

        return $newsCreateDTO;
    }
}
