<?php

namespace Domains\Media\Http\Requests\Image;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Attachment\Services\Contracts\DTOs\ContentFileDTO;
use Domains\Media\Services\Contracts\DTOs\MediaEditDTO;
use Illuminate\Validation\Rule;

class EditImageRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'media_id'         => 'required|integer|exists:media,id',
            'first_title'      => 'required|string',
            'category_ids'     => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date'     => 'required|numeric',
            'slug'             => 'string|unique:media',
            'province_id'      => 'integer|exists:provinces,id',
            'language'         => ['required', Rule::in(config('media.media_language'))],
            'images.*'         => 'image|max:500',
            'content.*.file'   => 'image|max:500',
            'content.*.link'   => 'url',
            'content.*.title'  => 'string',
            'content'          => 'array'
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

    public function createMediaEditDTO()
    {
        $mediaEditDTO = new MediaEditDTO();
        $mediaEditDTO->setMediaId($this['media_id'])
            ->setProvinceId($this['province_id'])
            ->setCategories($this['category_ids'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setEditor(\Auth::user())
            ->setLanguage($this['language'])
            ->setFirstTitle($this['first_title'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setAttachmentFiles($this['images'])
            ->setType(config('media.media_type_image'))
            ->setContentFiles($this->makeContentFileDTOs())
            ->setSlug($this['slug']);

        return $mediaEditDTO;
    }

    private function makeContentFileDTOs()
    {
        $contents = [];
        foreach ($this['content'] as $content) {
            $contentFileDTO = new ContentFileDTO();
            $contentFileDTO->setTitle($content['title'] ?? null)
                ->setFile($content['file'] ?? null)
                ->setLink($content['link'] ?? null);
            $contents[] = $contentFileDTO;
        }
        return $contents;
    }
}