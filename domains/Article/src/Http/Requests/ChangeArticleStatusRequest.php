<?php

namespace Domains\Article\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Illuminate\Validation\Rule;

class ChangeArticleStatusRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_id' => 'required|integer|exists:articles,id',
            'status'  => [
                'required',
                'string',
                Rule::in([
                    config('article.article_accept_status'),
                    config('article.article_reject_status'),
                    config('article.article_cancel_status'),
                    config('article.article_pending_status'),
                    config('article.article_recycle_status'),
                ]),
            ],
        ];
    }

    public function messages()
    {
        return trans('article::validation');
    }

    public function attributes()
    {
        return trans('article::validation.attributes');
    }

    public function createArticleFilterDTO(): ArticleFilterDTO
    {
        $articleFilterDTO = new ArticleFilterDTO();
        $articleFilterDTO->setCreateDateEnd($this['create_date_end'] ?
            Carbon::createFromTimestamp(
                $this['create_date_end'])->toDateTimeString() : null
        )
            ->setCreateDateStart($this['create_date_start'] ?
                Carbon::createFromTimestamp(
                    $this['create_date_start'])->toDateTimeString() : null
            )
            ->setPublisherId($this['publisher_id'])
            ->setArticleInputStatus($this['status'])
            ->setSort($this['sort'] ?? 'DESC')
            ->setFirstTitle($this['first_title']);

        return $articleFilterDTO;
    }
}
