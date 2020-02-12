<?php

namespace Domains\Category\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Category\Services\Contracts\DTOs\CategoryCreateDTO;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en'   => 'required|string',
            'name_fa'   => 'required|string',
            'type'      => ['required', 'string', Rule::in(config('category.categoryType'))],
            'parent_id' => 'integer|exists:categories,id',
        ];
    }

    public function messages()
    {
        return trans('category::validation');
    }

    public function attributes()
    {
        return trans('category::validation.attributes');
    }

    public function createCategoryCreateDTO(): CategoryCreateDTO
    {
        $categoryCreateDTO = new CategoryCreateDTO();
        $categoryCreateDTO->setNameFa($this['name_fa'])
            ->setNameEn($this['name_en'])
            ->setType($this['type'])
            ->setParentId($this['parent_id']);
        return $categoryCreateDTO;
    }
}
