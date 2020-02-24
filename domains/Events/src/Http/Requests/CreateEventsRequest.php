<?php

namespace Domains\Events\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Events\Services\Contracts\DTOs\EventsCreateDTO;
use Illuminate\Validation\Rule;

class CreateEventsRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'abstract' => 'string',
            'description' => 'string',
            'event_start_date' => 'required|numeric',
            'event_end_date' => 'required|numeric',
            'event_start_register_date' => 'required|numeric',
            'event_end_register_date' => 'required|numeric',
            'category_id' => 'integer|exists:categories,id',
            'publish_date' => 'required|numeric',
            'source_link_text' => 'url',
            'source_link_image' => 'url',
            'source_link_video' => 'url',
            'location' => 'string',
            'province_id' => 'required|integer|exists:provinces,id',
            'parent_id'    => 'integer|exists:events,id|unique:events',
            'language' => ['required', Rule::in(config('events.event_language'))],
            'images.*' => 'image'
        ];
    }

    public function messages()
    {
        return trans('events::validation');
    }

    public function attributes()
    {
        return trans('events::validation.attributes');
    }

    public function createEventsCreateDTO()
    {
        $evetsCreateDTO = new EventsCreateDTO();
        $evetsCreateDTO->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategoryId($this['category_id'])
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
            ->setParentId($this['parent_id']);
        return $evetsCreateDTO;
    }
}
