<?php

namespace Domains\Menu\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Menu\Services\Contracts\DTOs\MenusEditDTO;
use Illuminate\Validation\Rule;

class EditMenuRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'menu_id' => 'required|integer|exists:menus,id',
            'name' => 'required|string',
            'title' => 'required|string',
            'alias' => 'required|string',
            'publish_date' => 'numeric',
            'link' => 'url',
            'parent_id'    => 'integer|exists:menus,id',
            'menuable_id'    => ['integer', new ChechIdValidInEntitiesRequest($this['type'])],
            'language' => ['required', Rule::in(config('menus.menu_language'))],
            'type' => ['required', Rule::in(config('menus.menus_type'))],
            'priority' => 'required','integer',
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

    public function editMenusDTO()
    {
        $menusEditDTO = new MenusEditDTO();
        $menusEditDTO->setMenuId($this['menu_id'])
            ->setName($this['name'])
            ->setTitle($this['title'])
            ->setAlias($this['alias'])
            ->setType($this['type'])
            ->setLink($this['link'])
            ->setEditor(\Auth::user())
            ->setLanguage($this['language'])
            ->setPublishDate(Carbon::createFromTimestamp($this['publish_date'])->toDateTimeString())
            ->setParentId($this['parent_id'])
            ->setManuableId($this['menuable_id'])
            ->setPriority($this['priority']);
        return $menusEditDTO;
    }
}
