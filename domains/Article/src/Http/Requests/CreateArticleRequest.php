<?php

namespace Domains\Article\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Article\Services\Contracts\DTOs\ArticleCreateDTO;
use Illuminate\Validation\Rule;

class CreateArticleRequest extends EhdaBaseRequest
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
            'third_title'      => 'string',
            'abstract'         => 'string',
            'description'      => 'string',
            'category_ids'     => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date'     => 'numeric',
            'slug'             => 'string|required|unique:articles',
            'province_id'      => 'integer|exists:provinces,id',
            'parent_id'        => 'integer|exists:articles,id|unique:articles',
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

    public function createArticleCreateDTO()
    {
        $articleCreateDTO = new ArticleCreateDTO();
        $articleCreateDTO->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategories($this['category_ids'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setDescription($this['description'])
            ->setPublisher(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate($this['publish_date'] ?
                Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString() :
                Carbon::now()->format('Y-m-d H:i:s')
            )
            ->setSecondTitle($this['second_title'])
            ->setThirdTitle($this['third_title'])
            ->setParentId($this['parent_id'])
            ->setAttachmentFiles($this['images'])
            ->setSlug($this['slug']);
        return $articleCreateDTO;
    }
}
