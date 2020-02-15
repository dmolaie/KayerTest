<?php

namespace Domains\News\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\News\Services\Contracts\DTOs\NewsCreateDTO;
use Domains\User\Entities\User;
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
            'first_title'  => 'required|string',
            'second_title' => 'string',
            'abstract'     => 'string',
            'description'  => 'string',
            'category_id'  => 'integer|exists:categories,id',
            'publish_date' => 'required|date_format:Y-m-d H:i:s',
            'source_link'  => 'url',
            'province_id'  => 'required|integer|exists:provinces,id',
            'language'     => ['required', Rule::in(config('news.news_language'))],
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
            ->setCategoryId($this['category_id'])
            ->setDescription($this['description'])
            ->setEditor(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate($this['publish_date'])
            ->setSecondTitle($this['second_title'])
            ->setSourceLink($this['source_link']);

        return $newsCreateDTO;
    }
}
