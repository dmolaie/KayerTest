<?php

namespace Domains\Article\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Illuminate\Validation\Rule;

class ArticleListForAdminRequest extends EhdaBaseRequest
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
            'status'            => [Rule::in(config('article.article_list_status'))]
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
            ->setFirstTitle($this['first_title']);

        return $articleFilterDTO;
    }
}
