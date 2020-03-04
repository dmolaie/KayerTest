<?php

namespace Domains\Menu\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Menu\Services\Contracts\DTOs\MenuPriorityDTO;

class MenuPriorityRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'menu_items'            => 'array',
            'menu_items.*.id'       => 'integer',
            'menu_items.*.children' => 'array',
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

    public function createMenuPriorityDTOs()
    {
        $priorityDTOs = [];
        return $this->makePriorityDTO($this['menu_items'],$priorityDTOs);
    }

    protected function makePriorityDTO($items, &$priorityDTOs)
    {
        $priority = 1;
        foreach ($items as $item) {
            $menuPriorityDTO = new MenuPriorityDTO();
            if (isset($item['id'])) {
                $menuPriorityDTO->setId($item['id'])
                    ->setPriority($priority);
                        if($item['children']) {
                            $this->makePriorityDTO($item['children'], $priorityDTOs);
                        }
                $priority++;
                $priorityDTOs[] = $menuPriorityDTO;
            }

        }
        return $priorityDTOs;
    }
}
