<?php

namespace Domains\Event\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Event\Services\Contracts\DTOs\EventCreateDTO;
use Illuminate\Validation\Rule;

class CreateEventRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                     => 'required|string',
            'abstract'                  => 'string',
            'description'               => 'string',
            'event_start_date'          => 'required|numeric',
            'event_end_date'            => 'required|numeric',
            'event_start_register_date' => 'required|numeric',
            'event_end_register_date'   => 'required|numeric',
            'category_ids'              => 'array|exists:categories,id',
            'main_category_id'          => 'integer|exists:categories,id',
            'publish_date'              => 'required|numeric',
            'source_link_text'          => 'url',
            'source_link_image'         => 'url',
            'source_link_video'         => 'url',
            'location'                  => 'string',
            'province_id'               => 'required|integer|exists:provinces,id',
            'parent_id'                 => 'integer|exists:events,id|unique:events',
            'language'                  => ['required', Rule::in(config('event.event_language'))],
            'images.*'                  => 'image',
            'slug'                      => 'string|required|unique:events'
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

    public function createEventCreateDTO()
    {
        $eventCreateDTO = new EventCreateDTO();
        $eventCreateDTO->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategoryIds($this['category_ids'])
            ->setCategoryIsMain($this['main_category_id'])
            ->setDescription($this['description'])
            ->setPublisher(\Auth::user())
            ->setLanguage($this['language'])
            ->setTitle($this['title'])
            ->setLocation($this['location'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setEventStartDate(Carbon::createFromTimestamp($this['event_start_date'])->toDateTimeString())
            ->setEventEndDate(Carbon::createFromTimestamp($this['event_end_date'])->toDateTimeString())
            ->setEventStartRegisterDate(Carbon::createFromTimestamp($this['event_start_register_date'])->toDateTimeString())
            ->setEventEndRegisterDate(Carbon::createFromTimestamp($this['event_end_register_date'])->toDateTimeString())
            ->setAttachmentFiles($this['images'])
            ->setSourceLinkText($this['source_link_text'])
            ->setSourceLinkImage($this['source_link_image'])
            ->setSourceLinkVideo($this['source_link_video'])
            ->setSlug($this['slug'])
            ->setParentId($this['parent_id']);
        return $eventCreateDTO;
    }
}
