<?php

namespace Domains\Media\Http\Requests\Image;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Media\Services\Contracts\DTOs\MediaFilterDTO;
use Illuminate\Validation\Rule;

class ChangeImageStatusRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'status'  => [
                'required',
                'string',
                Rule::in([
                    config('media.media_accept_status'),
                    config('media.media_reject_status'),
                    config('media.media_cancel_status'),
                    config('media.media_pending_status'),
                    config('media.media_recycle_status'),
                ]),
            ],
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

    public function createMediaFilterDTO(): MediaFilterDTO
    {
        $mediaFilterDTO = new MediaFilterDTO();
        $mediaFilterDTO->setCreateDateEnd($this['create_date_end'] ?
            Carbon::createFromTimestamp(
                $this['create_date_end'])->toDateTimeString() : null
        )
            ->setCreateDateStart($this['create_date_start'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_start'])->toDateTimeString() : null
            )
            ->setPublisherId($this['publisher_id'])
            ->setMediaInputStatus($this['status'])
            ->setSort($this['sort'] ?? 'DESC')
            ->setFirstTitle($this['first_title']);

        return $mediaFilterDTO;
    }
}
