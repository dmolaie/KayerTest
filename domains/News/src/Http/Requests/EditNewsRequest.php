<?php

namespace Domains\News\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\News\Services\Contracts\DTOs\NewsEditDTO;
use Illuminate\Validation\Rule;

class EditNewsRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_id' => 'required|integer|exists:news,id',
            'first_title' => 'required|string',
            'second_title' => 'string',
            'abstract' => 'string',
            'description' => 'string',
            'category_id' => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date' => 'required|numeric',
            'source_link' => 'url',
            'province_id' => 'required|integer|exists:provinces,id',
            'language' => ['required', Rule::in(config('news.news_language'))],
            'images.*' => 'image'
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

    public function createNewsEditDTO()
    {
        $newsEditDTO = new NewsEditDTO();
        $newsEditDTO->setNewsId($this['news_id'])
            ->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategoryId($this['category_id'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setDescription($this['description'])
            ->setEditor(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setSecondTitle($this['second_title'])
            ->setAttachmentFiles($this['images'])
            ->setSourceLink($this['source_link']);

        return $newsEditDTO;
    }
}
