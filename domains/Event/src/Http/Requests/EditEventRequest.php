<?php

namespace Domains\Event\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Event\Services\Contracts\DTOs\EventEditDTO;
use Illuminate\Validation\Rule;

class EditEventRequest extends EhdaBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id'                  => 'required|integer|exists:events,id',
            'title'                     => 'required|string',
            'abstract'                  => 'string',
            'description'               => 'string',
            'event_start_date'          => 'numeric',
            'event_end_date'            => 'numeric',
            'event_start_register_date' => 'numeric',
            'event_end_register_date'   => 'numeric',
            'category_ids'              => 'array|exists:categories,id',
            'main_category_id'          => 'integer|exists:categories,id',
            'publish_date'              => 'numeric',
            'source_link_text'          => 'url',
            'source_link_image'         => 'url',
            'source_link_video'         => 'url',
            'location'                  => 'string',
            'slug'                      => 'string|unique:events',
            'province_id'               => 'required|integer|exists:provinces,id',
            'language'                  => ['required', Rule::in(config('event.event_language'))],
            'images.*'                  => 'image'
        ];
    }

    public function messages()
    {
        return trans('event::validation');
    }

    public function attributes()
    {
        return trans('event::validation.attributes');
    }

    public function createEventEditDTO()
    {
        $newsEditDTO = new EventEditDTO();
        $newsEditDTO->setEventId($this['event_id'])
            ->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategoryIds($this['category_ids'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setDescription($this['description'])
            ->setLanguage($this['language'])
            ->setTitle($this['title'])
            ->setLocation($this['location'])
            ->setEditor(\Auth::user())
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setEventStartDate(Carbon::createFromTimestamp($this['event_start_date'])->toDateTimeString())
            ->setEventEndDate(Carbon::createFromTimestamp($this['event_end_date'])->toDateTimeString())
            ->setEventStartRegisterDate(Carbon::createFromTimestamp($this['event_start_register_date'])->toDateTimeString())
            ->setEventEndRegisterDate(Carbon::createFromTimestamp($this['event_end_register_date'])->toDateTimeString())
            ->setAttachmentFiles($this['images'])
            ->setSourceLinkText($this['source_link_text'])
            ->setSourceLinkImage($this['source_link_image'])
            ->setSlug($this['slug'])
            ->setSourceLinkVideo($this['source_link_video']);

        return $newsEditDTO;
    }
}
