<?php

namespace Domains\News\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Illuminate\Validation\Rule;

class NewsListForAdminRequest extends EhdaBaseRequest
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
            'status'            => [Rule::in(config('news.news_list_status'))],
            'sort'              => [Rule::in('DESC', 'ASC')]
        ];
    }

    public function messages()
    {
        return trans('news::validation');
    }

    public function attributes()
    {
        return trans('news::validation.attributes');
    }

    public function createNewsFilterDTO(): NewsFilterDTO
    {
        $newsFilterDTO = new NewsFilterDTO();
        $newsFilterDTO->setCreateDateEnd(
            $this['create_date_end'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_end'])->toDateTimeString() : null)
            ->setCreateDateStart($this['create_date_start'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_start'])->toDateTimeString() : null)
            ->setPublisherId($this['publisher_id'])
            ->setNewsInputStatus($this['status'])
            ->setSort($this['sort'] ?? 'DESC')
            ->setFirstTitle($this['first_title']);
        return $newsFilterDTO;
    }
}
