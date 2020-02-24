<?php

namespace Domains\Events\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Events\Services\Contracts\DTOs\EventsFilterDTO;
use Illuminate\Validation\Rule;

class EventsListForAdminRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string',
            'create_date_start' => 'numeric',
            'create_date_end' => 'numeric',
            'publisher_id' => 'integer',
            'status' => [Rule::in(config('events.events_list_status'))]
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

    public function createEventsFilterDTO(): EventsFilterDTO
    {
        $eventsFilterDTO = new EventsFilterDTO();
        $eventsFilterDTO->setCreateDateEnd($this['create_date_end'])
            ->setCreateDateStart($this['create_date_start'])
            ->setPublisherId($this['publisher_id'])
            ->setEventsInputStatus($this['status'] ?? config('events.events_publish_status'))
            ->setTitle($this['first_title']);
        return $eventsFilterDTO;
    }
}
