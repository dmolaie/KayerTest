<?php

namespace Domains\Event\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Illuminate\Validation\Rule;

class EventListForAdminRequest extends EhdaBaseRequest
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
            'status' => [Rule::in(config('event.event_list_status'))]
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

    public function createEventFilterDTO(): EventFilterDTO
    {
        $eventFilterDTO = new EventFilterDTO();
        $eventFilterDTO->setCreateDateEnd(
            $this['create_date_end'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_end'])->toDateTimeString() : null)
            ->setCreateDateStart($this['create_date_start'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_start'])->toDateTimeString() : null)
            ->setPublisherId($this['publisher_id'])
            ->setEventInputStatus($this['status'])
            ->setTitle($this['first_title']);

        return $eventFilterDTO;
    }
}
