<?php

namespace Domains\Menu\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;
use Illuminate\Validation\Rule;

class CreateMenuRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|string',
            'title'        => 'required|string',
            'alias'        => 'required|string|unique:menus,alias',
            'publish_date' => 'numeric',
            'link'         => 'string',
            'parent_id'    => 'integer|exists:menus,id',
            'menuable_id'  => ['integer', new ChechIdValidInEntitiesRequest($this['type'])],
            'language'     => ['required', Rule::in(config('menus.menu_language'))],
            'type'         => ['required', Rule::in(array_values(config('menus.menus_type')))],
            'priority'     => 'required',
            'integer',
        ];
    }

    public function messages()
    {
        return trans('menus::validation');
    }

    public function attributes()
    {
        return trans('menus::validation.attributes');
    }

    public function createMenusDTO()
    {
        $menusCreateDTO = new MenusCreateDTO();
        $menusCreateDTO->setName($this['name'])
            ->setTitle($this['title'])
            ->setAlias($this['alias'])
            ->setType($this['type'])
            ->setLink($this['link'])
            ->setPublisher(\Auth::user())
            ->setLanguage($this['language'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setParentId($this['parent_id'])
            ->setManuableId($this['menuable_id'])
            ->setPriority($this['priority']);
        return $menusCreateDTO;
    }
}
