<?php

namespace Domains\Menus\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Menus\Services\Contracts\DTOs\MenusCreateDTO;
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
            'name' => 'required|string',
            'title' => 'required|string',
            'alias' => 'required|string',
            'publish_date' => 'numeric',
            'link' => 'url',
            'parent_id'    => 'integer|exists:menus,id|unique:menus',
            'language' => ['required', Rule::in(config('menus.menu_language'))],
            'type' => ['required', Rule::in(config('menus.menus_type'))],
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
            ->setParentId($this['parent_id']);
        return $menusCreateDTO;
    }
}
