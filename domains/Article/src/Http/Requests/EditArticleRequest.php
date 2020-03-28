<?php

namespace Domains\Article\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Article\Services\Contracts\DTOs\ArticleEditDTO;
use Illuminate\Validation\Rule;

class EditArticleRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_id'       => 'required|integer|exists:articles,id',
            'first_title'      => 'required|string',
            'second_title'     => 'string',
            'third_title'      => 'string',
            'abstract'         => 'string',
            'description'      => 'string',
            'category_ids'      => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date'     => 'required|numeric',
            'slug'             => 'string|unique:articles',
            'province_id'      => 'integer|exists:provinces,id',
            'language'         => ['required', Rule::in(config('article.article_language'))],
            'images.*'         => 'image'
        ];
    }

    public function messages()
    {
        return trans('article::validation');
    }

    public function attributes()
    {
        return trans('article::validation.attributes');
    }

    public function createArticleEditDTO()
    {
        $articleEditDTO = new ArticleEditDTO();
        $articleEditDTO->setArticleId($this['article_id'])
            ->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategories($this['category_ids'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setDescription($this['description'])
            ->setEditor(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setSecondTitle($this['second_title'])
            ->setThirdTitle($this['third_title'])
            ->setAttachmentFiles($this['images'])
            ->setSlug($this['slug']);

        return $articleEditDTO;
    }
}
