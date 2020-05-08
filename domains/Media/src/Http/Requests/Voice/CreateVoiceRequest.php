<?php

namespace Domains\Media\Http\Requests\Voice;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Attachment\Services\Contracts\DTOs\ContentFileDTO;
use Domains\Media\Services\Contracts\DTOs\MediaCreateDTO;
use Illuminate\Validation\Rule;

class CreateVoiceRequest extends EhdaBaseRequest
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
            'content.*.file'   => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:10240',
            'content.*.link'   => 'url',
            'content.*.title'  => 'string',
            'content'          => 'array',
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
        $message = trans('media::validation');
        $message['mimes'] = trans('media::response.voice_format');
        return $message;
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
            ->setType(config('media.media_type_voice'))
            ->setAbstract($this['abstract'])
            ->setDescription($this['description'])
            ->setContentFiles($this['content']?$this->makeContentFileDTOs():[])
            ->setSlug($this['slug']);
        return $mediaCreateDTO;
    }

    private function makeContentFileDTOs()
    {
        $contents = [];
        foreach ($this['content'] as $content) {
            $contentFileDTO = new ContentFileDTO();
            $contentFileDTO->setTitle($content['title']??null)
                ->setFile($content['file']??null)
                ->setLink($content['link']??null);
            $contents[] = $contentFileDTO;
        }
        return $contents;
    }
}
