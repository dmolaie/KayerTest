<?php

namespace Domains\Media\Http\Requests\Text;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Media\Services\Contracts\DTOs\MediaCreateDTO;
use Illuminate\Validation\Rule;

class CreateTextRequest extends EhdaBaseRequest
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
            'description'      => 'string',
            'abstract'         => 'string',
            'content.*'        => 'mimetypes:application/pdf,application/msword|max:10000',
            'content'          => 'required|array',
            'category_ids'     => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date'     => 'numeric',
            'slug'             => 'string|required|unique:media',
            'province_id'      => 'integer|exists:provinces,id',
            'parent_id'        => 'integer|exists:media,id|unique:media',
            'language'         => ['required', Rule::in(config('media.media_language'))],
            'images.*'         => 'image|max:500'
        ];
    }

    public function messages()
    {
        return trans('media::validation');
    }

    public function attributes()
    {
        return trans('media::validation.attributes');
    }

    public function createMediaCreateDTO()
    {
        $mediaCreateDTO = new MediaCreateDTO();
        $mediaCreateDTO->setProvinceId($this['province_id'])
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
            ->setParentId($this['parent_id'])
            ->setAttachmentFiles($this['images'])
            ->setType(config('media.media_type_text'))
            ->setAbstract($this['abstract'])
            ->setDescription($this['description'])
            ->setContentFiles($this['content'])
            ->setSlug($this['slug']);
        return $mediaCreateDTO;
    }
}
