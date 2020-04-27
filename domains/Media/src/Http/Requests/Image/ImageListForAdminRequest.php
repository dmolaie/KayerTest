<?php

namespace Domains\Media\Http\Requests\Image;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Media\Services\Contracts\DTOs\MediaFilterDTO;
use Illuminate\Validation\Rule;

class ImageListForAdminRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_title'       => 'string',
            'create_date_start' => 'numeric',
            'create_date_end'   => 'numeric',
            'publisher_id'      => 'integer',
            'status'            => [Rule::in(config('media.media_list_status'))],
            'sort'              => [Rule::in('DESC', 'ASC')]
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
            ->setType(config('media.media_type_image'))
            ->setFirstTitle($this['first_title']);

        return $mediaFilterDTO;
    }
}
