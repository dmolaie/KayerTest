<?php

namespace Domains\Events\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Events\Services\Contracts\DTOs\EventsEditDTO;
use Illuminate\Validation\Rule;

class EditEventsRequest extends EhdaBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id' => 'required|integer|exists:events,id',
            'title' => 'required|string',
            'abstract' => 'string',
            'description' => 'string',
            'event_start_date' => 'numeric',
            'event_end_date' => 'numeric',
            'event_start_register_date' => 'numeric',
            'event_end_register_date' => 'numeric',
            'category_id' => 'array|exists:categories,id',
            'main_category_id' => 'integer|exists:categories,id',
            'publish_date' => 'numeric',
            'source_link_text' => 'url',
            'source_link_image' => 'url',
            'source_link_video' => 'url',
            'location' => 'string',
            'province_id' => 'required|integer|exists:provinces,id',
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

    public function createEventsEditDTO()
    {
        $newsEditDTO = new EventsEditDTO();
        $newsEditDTO->setEventsId($this['event_id'])
            ->setProvinceId($this['province_id'])
            ->setAbstract($this['abstract'])
            ->setCategoryId($this['category_id'])
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
            ->setSourceLinkVideo($this['source_link_video']);

        return $newsEditDTO;
    }
}
